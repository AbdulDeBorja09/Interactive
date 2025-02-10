let hallwayDots = Array.from(document.querySelectorAll(".hallway"));
// Dijkstra's algorithm for finding the shortest path through all hallways
function dijkstra(startRoomId, endRoomId, hallwayDots) {
    let graph = {};

    // Create a graph where each hallway is connected to its neighbors in a circular manner
    hallwayDots.forEach((dot) => {
        let roomId = dot.getAttribute("data-room-id");
        graph[roomId] = [];

        let index = hallwayDots.findIndex(
            (d) => d.getAttribute("data-room-id") === roomId
        );
        let prev =
            hallwayDots[(index - 1 + hallwayDots.length) % hallwayDots.length];
        let next = hallwayDots[(index + 1) % hallwayDots.length];

        let distancePrev = prev ? calculateDistance(dot, prev) : null;
        let distanceNext = next ? calculateDistance(dot, next) : null;

        if (prev && distancePrev !== null) {
            graph[roomId].push({
                roomId: prev.getAttribute("data-room-id"),
                distance: distancePrev,
            });
        }
        if (next && distanceNext !== null) {
            graph[roomId].push({
                roomId: next.getAttribute("data-room-id"),
                distance: distanceNext,
            });
        }

        // console.log(`Node ${roomId} connects to:`, graph[roomId]);
    });

    let distances = {};
    let previous = {};
    let nodes = new Set();

    hallwayDots.forEach((dot) => {
        let roomId = dot.getAttribute("data-room-id");
        distances[roomId] = Infinity;
        previous[roomId] = null;
        nodes.add(roomId);
    });
    distances[startRoomId] = 0;

    // Implement Dijkstra to find the shortest path
    while (nodes.size) {
        let closestNode = null;
        let minDistance = Infinity;

        nodes.forEach((node) => {
            if (distances[node] < minDistance) {
                minDistance = distances[node];
                closestNode = node;
            }
        });

        if (!closestNode) {
            console.error(
                "Dijkstra error: No closest node found, graph may be disconnected."
            );
            return [];
        }

        if (closestNode === endRoomId) {
            break;
        }

        nodes.delete(closestNode);

        if (!graph[closestNode]) {
            console.error(
                `Graph error: Node '${closestNode}' not found in graph.`
            );
            return [];
        }

        graph[closestNode].forEach((neighbor) => {
            let alt = distances[closestNode] + neighbor.distance;
            if (alt < distances[neighbor.roomId]) {
                distances[neighbor.roomId] = alt;
                previous[neighbor.roomId] = closestNode;
            }
        });
    }

    // Reconstruct the path from start to end
    let path = [];
    let currentNode = endRoomId;

    while (currentNode && currentNode !== startRoomId) {
        path.push(currentNode);
        currentNode = previous[currentNode];

        if (!currentNode) {
            console.error("Path reconstruction failed: No valid path found.");
            return [];
        }
    }

    path.push(startRoomId);
    return path.reverse();
}

function calculateDistance(el1, el2) {
    if (!el1 || !el2) return Infinity;

    let x1, y1, x2, y2;

    // Check if elements are SVG <circle> dots
    if (
        (el1.tagName.toLowerCase() === "circle" &&
            el2.tagName.toLowerCase() === "circle") ||
        (el1.tagName.toLowerCase() === "ellipse" &&
            el2.tagName.toLowerCase() === "ellipse") ||
        (el1.tagName.toLowerCase() === "path" &&
            el2.tagName.toLowerCase() === "path")
    ) {
        x1 = parseFloat(el1.getAttribute("cx"));
        y1 = parseFloat(el1.getAttribute("cy"));
        x2 = parseFloat(el2.getAttribute("cx"));
        y2 = parseFloat(el2.getAttribute("cy"));
    } else {
        // Use bounding box for other elements
        let rect1 = el1.getBoundingClientRect();
        let rect2 = el2.getBoundingClientRect();

        x1 = rect1.left + rect1.width / 2;
        y1 = rect1.top + rect1.height / 2;
        x2 = rect2.left + rect2.width / 2;
        y2 = rect2.top + rect2.height / 2;
    }

    return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
}

// Draw the route incrementally (visiting each nearest hallway)
function drawRoute() {
    let startRoomId = document.getElementById("start-hidden").value;
    let endRoomId = document.getElementById("end-hidden").value;

    let startFloor = startRoomId.match(/(room-..)/)?.[1] || "";
    let endFloor = endRoomId.match(/(room-..)/)?.[1] || "";

    if (startFloor === endFloor) {
        bottomSheet.style.height = `${minHeight}px`;
        navigateSameFloor(startFloor, startRoomId, endRoomId);
    } else {
        bottomSheet.style.height = `${minHeight}px`;
        navigateBetweenFloors(startFloor, startRoomId, endFloor, endRoomId);
    }
}

function navigateSameFloor(floor, startRoomId, endRoomId) {
    let svg = document.querySelector(`svg[data-name="${floor}"]`);
    if (!svg) {
        alert("Floor not found!");
        return;
    }

    let hallwayDots = Array.from(svg.querySelectorAll(".hallway"));
    let path = dijkstra(startRoomId, endRoomId, hallwayDots);
    drawPath(svg, path);
}

function navigateBetweenFloors(startFloor, startRoomId, endFloor, endRoomId) {
    let startSVG = document.querySelector(`svg[data-name="${startFloor}"]`);
    let endSVG = document.querySelector(`svg[data-name="${endFloor}"]`);
    if (!startSVG || !endSVG) {
        alert("Floor not found!");
        return;
    }

    let hallwayDotsStart = Array.from(startSVG.querySelectorAll(".hallway"));
    let hallwayDotsEnd = Array.from(endSVG.querySelectorAll(".hallway"));

    let stairsStart = Array.from(startSVG.querySelectorAll(".stairs"));
    let stairsEnd = Array.from(endSVG.querySelectorAll(".stairs"));

    // Find the closest stair to the start room
    let closestStairStart = findClosestStair(
        startRoomId,
        stairsStart,
        startSVG
    );

    if (!closestStairStart) {
        alert("No available stairs on the start floor!");
        return;
    }

    // Find the corresponding stair on the destination floor
    let closestStairEnd = stairsEnd.find(
        (stair) => stair.getAttribute("data-name") === closestStairStart.stairId
    );

    if (!closestStairEnd) {
        alert("No corresponding stair found on the destination floor!");
        return;
    }

    let pathStart = dijkstra(
        startRoomId,
        closestStairStart.stairId,
        hallwayDotsStart
    );
    let pathEnd = dijkstra(
        closestStairEnd.getAttribute("data-name"),
        endRoomId,
        hallwayDotsEnd
    );

    drawPath(startSVG, pathStart);
    drawPath(endSVG, pathEnd);
}
function findClosestStair(roomId, stairs, svg) {
    let room = svg.querySelector(`.hallway[data-room-id="${roomId}"]`);
    if (!room || stairs.length === 0) {
        console.log("Room or stairs not found!", room, stairs);
        return null;
    }

    let closestStair = null,
        minDistance = Infinity;
    stairs.forEach((stair) => {
        let stairId = stair.getAttribute("data-name");
        if (!stairId) return;

        let distance = calculateDistance(room, stair);
        if (distance < minDistance) {
            minDistance = distance;
            closestStair = stairId; // Return stair ID for Dijkstra
        }
    });

    return closestStair;
}

function drawPath(svg, path) {
    let pathElement = svg.querySelector("#route-path");
    if (!pathElement) return;

    let pathData = path
        .map((roomId) => {
            let dot = svg.querySelector(`.hallway[data-room-id="${roomId}"]`);
            return `${dot.getAttribute("cx")},${dot.getAttribute("cy")}`;
        })
        .join(" ");

    if (pathData) {
        pathElement.setAttribute("d", `M ${pathData}`);
        pathElement.style.display = "block";
    }
}

document.querySelector(".btn").addEventListener("click", drawRoute);
