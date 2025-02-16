// Dijkstra's algorithm for finding the shortest path between two nodes
function dijkstra(startRoomId, endRoomId, nodesArray) {
    // Ensure every node in nodesArray has a valid data-room-id.
    nodesArray.forEach((node) => {
        if (
            !node.getAttribute("data-room-id") &&
            node.getAttribute("data-name")
        ) {
            node.setAttribute("data-room-id", node.getAttribute("data-name"));
        }
    });

    let graph = {};

    // Build the graph by connecting each node to its neighbors in a circular array
    nodesArray.forEach((node, index) => {
        let roomId = node.getAttribute("data-room-id");
        if (!roomId) {
            console.warn("Node missing data-room-id", node);
            return;
        }
        graph[roomId] = [];

        // Determine previous and next nodes (circularly)
        let prevIndex = (index - 1 + nodesArray.length) % nodesArray.length;
        let nextIndex = (index + 1) % nodesArray.length;
        let prevNode = nodesArray[prevIndex];
        let nextNode = nodesArray[nextIndex];

        let distancePrev = prevNode
            ? calculateDistance(node, prevNode)
            : Infinity;
        let distanceNext = nextNode
            ? calculateDistance(node, nextNode)
            : Infinity;

        if (prevNode && prevNode.getAttribute("data-room-id")) {
            graph[roomId].push({
                roomId: prevNode.getAttribute("data-room-id"),
                distance: distancePrev,
            });
        }
        if (nextNode && nextNode.getAttribute("data-room-id")) {
            graph[roomId].push({
                roomId: nextNode.getAttribute("data-room-id"),
                distance: distanceNext,
            });
        }
    });

    // Initialize distances and previous-node mappings
    let distances = {};
    let previous = {};
    let nodes = new Set();

    nodesArray.forEach((node) => {
        let roomId = node.getAttribute("data-room-id");
        if (!roomId) return;
        distances[roomId] = Infinity;
        previous[roomId] = null;
        nodes.add(roomId);
    });
    distances[startRoomId] = 0;

    // Main loop: find the closest node, update distances until finished
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

    // Reconstruct the path from endRoomId back to startRoomId
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

// Calculate Euclidean distance between two elements (SVG or HTML)
function calculateDistance(el1, el2) {
    if (!el1 || !el2) return Infinity;

    let x1, y1, x2, y2;

    // If both elements are SVG shapes (circle, ellipse, or path)
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
        // Otherwise, use the center of the bounding box
        let rect1 = el1.getBoundingClientRect();
        let rect2 = el2.getBoundingClientRect();
        x1 = rect1.left + rect1.width / 2;
        y1 = rect1.top + rect1.height / 2;
        x2 = rect2.left + rect2.width / 2;
        y2 = rect2.top + rect2.height / 2;
    }

    return Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
}

// Draw the route based on current start and end room values
function drawRoute() {
    let startRoomId = document.getElementById("start-hidden").value;
    let endRoomId = document.getElementById("end-hidden").value;

    // Extract floor identifiers from the room IDs (e.g., "room-1A")
    let startFloor = startRoomId.match(/(room-..)/)?.[1] || "";
    let endFloor = endRoomId.match(/(room-..)/)?.[1] || "";

    // Assuming bottomSheet and minHeight are defined globally…
    bottomSheet.style.height = `${minHeight}px`;
    if (startFloor === endFloor) {
        navigateSameFloor(startFloor, startRoomId, endRoomId);
    } else {
        navigateBetweenFloors(startFloor, startRoomId, endFloor, endRoomId);
    }
}
function clearAllPaths() {
    let allSVGs = document.querySelectorAll("svg");
    allSVGs.forEach((svg) => {
        // Hide paths
        let drawnPaths = svg.querySelectorAll("#route-path");
        drawnPaths.forEach((path) => {
            path.style.display = "none"; // Hide the path
        });

        // // Hide circles
        // let drawnCircles = svg.querySelectorAll(".moving-circle");
        // drawnCircles.forEach((circle) => {
        //     circle.style.display = "none"; // Hide the circle
        // });
    });
}

// Navigate within the same floor
function navigateSameFloor(floor, startRoomId, endRoomId) {
    clearAllPaths();
    let svg = document.querySelector(`svg[data-name="${floor}"]`);
    if (!svg) {
        alert("Floor not found!");
        return;
    }
    let hallwayDots = Array.from(svg.querySelectorAll(".hallway"));
    let path = dijkstra(startRoomId, endRoomId, hallwayDots);
    drawPath(svg, path);
}

// Navigate between different floors
function navigateBetweenFloors(startFloor, startRoomId, endFloor, endRoomId) {
    clearAllPaths();
    let startSVG = document.querySelector(`svg[data-name="${startFloor}"]`);
    let endSVG = document.querySelector(`svg[data-name="${endFloor}"]`);
    if (!startSVG || !endSVG) {
        alert("Floor not found!");
        return;
    }

    // Include both hallways and stairs in the nodes used for the graph
    let hallwayDotsStart = Array.from(
        startSVG.querySelectorAll(".hallway, .stairs")
    );
    let hallwayDotsEnd = Array.from(
        endSVG.querySelectorAll(".hallway, .stairs")
    );

    // Get stairs separately so we can determine the closest one
    let stairsStart = Array.from(startSVG.querySelectorAll(".stairs"));
    let stairsEnd = Array.from(endSVG.querySelectorAll(".stairs"));

    // Make sure each stair has a data-room-id (use data-name if missing)
    stairsStart.forEach((stair) => {
        if (
            !stair.getAttribute("data-room-id") &&
            stair.getAttribute("data-name")
        ) {
            stair.setAttribute("data-room-id", stair.getAttribute("data-name"));
        }
    });
    stairsEnd.forEach((stair) => {
        if (
            !stair.getAttribute("data-room-id") &&
            stair.getAttribute("data-name")
        ) {
            stair.setAttribute("data-room-id", stair.getAttribute("data-name"));
        }
    });

    // Find the closest stair on the start floor (returns the stair's data-name)
    let closestStairStart = findClosestStair(
        startRoomId,
        stairsStart,
        startSVG
    );
    if (!closestStairStart) {
        alert("No available stairs on the start floor!");
        return;
    }

    // Find the corresponding stair on the destination floor using matching data-name
    let closestStairEnd = stairsEnd.find(
        (stair) => stair.getAttribute("data-name") === closestStairStart
    );

    if (!closestStairEnd) {
        alert("No corresponding stair found on the destination floor!");
        return;
    }

    // Compute path on the start floor from the start room to the stair
    let pathStart = dijkstra(startRoomId, closestStairStart, hallwayDotsStart);
    if (pathStart.length === 0) {
        alert("Path on start floor not found!");
        return;
    }

    // Compute path on the destination floor from the stair to the end room
    let pathEnd = dijkstra(
        closestStairEnd.getAttribute("data-room-id"),
        endRoomId,
        hallwayDotsEnd
    );
    if (pathEnd.length === 0) {
        alert("Path on destination floor not found!");
        return;
    }

    // Display the start floor SVG and animate the path
    startSVG.style.display = "block";
    endSVG.style.display = "none";
    drawPath(startSVG, pathStart);

    // Delay to simulate animation on the start floor, then switch to end floor
    setTimeout(() => {
        startSVG.style.display = "none";
        endSVG.style.display = "block";
        drawPath(endSVG, pathEnd);
    }, 5000); // Adjust the delay time based on your animation duration
}

// Finds the closest stair (by data-name) to the specified room on the given floor
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
        console.log("Stair:", stairId, "Distance:", distance);
        if (distance < minDistance) {
            minDistance = distance;
            closestStair = stairId;
        }
    });
    return closestStair;
}

// Draw the computed path on the provided SVG element
// Helper function to get proper SVG coordinates for a dot element
function getSVGCoordinates(dot, svg) {
    // Try to use the element's cx and cy attributes (if they exist)
    let cx = dot.getAttribute("cx");
    let cy = dot.getAttribute("cy");
    if (cx !== null && cy !== null) {
        return { x: parseFloat(cx), y: parseFloat(cy) };
    } else {
        // If not available, fall back to getBoundingClientRect, then convert to SVG coordinates
        let rect = dot.getBoundingClientRect();
        // Compute center of the element in client (screen) coordinates
        let clientX = rect.left + rect.width / 2;
        let clientY = rect.top + rect.height / 2;

        // Create an SVGPoint for conversion
        let point = svg.createSVGPoint();
        point.x = clientX;
        point.y = clientY;
        // Use the inverse of the current transformation matrix to convert
        let svgPoint = point.matrixTransform(svg.getScreenCTM().inverse());
        return { x: svgPoint.x, y: svgPoint.y };
    }
}

function drawPath(svg, path) {
    let pathElement = svg.querySelector("#route-path");
    if (!pathElement) {
        console.warn("No path element with id 'route-path' found.");
        return;
    }

    // Filter out intermediate stair nodes (keep if it's the first or last node)
    let filteredPath = path.filter((roomId, index) => {
        // Always include the first and last nodes.
        if (index === 0 || index === path.length - 1) return true;
        // Look up the element for this roomId.
        let dot = svg.querySelector(
            `.hallway[data-room-id="${roomId}"], .stairs[data-room-id="${roomId}"]`
        );
        // If it's a stair and not an endpoint, filter it out.
        if (dot && dot.classList.contains("stairs")) {
            return false;
        }
        return true;
    });

    // Build the path data string from the nodes in 'filteredPath'
    let pathDataArray = filteredPath
        .map((roomId) => {
            let dot = svg.querySelector(
                `.hallway[data-room-id="${roomId}"], .stairs[data-room-id="${roomId}"]`
            );
            if (!dot) {
                console.warn("Node not found for roomId:", roomId);
                return null;
            }
            let coords = getSVGCoordinates(dot, svg);
            if (!coords) {
                console.warn("Coordinates not found for roomId:", roomId);
                return null;
            }
            console.log(`Room ${roomId}: x=${coords.x}, y=${coords.y}`);
            return `${coords.x},${coords.y}`;
        })
        .filter((coordString) => coordString !== null);

    if (pathDataArray.length === 0) {
        console.warn("No valid coordinates found to build the path.");
        return;
    }
    let dAttribute = "M " + pathDataArray.join(" L ");
    pathElement.setAttribute("d", dAttribute);
    pathElement.style.display = "block";
    animateCircle(svg, pathElement);
}

function animateCircle(svg, pathElement) {
    if (!pathElement || pathElement.getTotalLength() === 0) {
        console.error("Invalid path element provided.");
        return;
    }

    const pathLength = pathElement.getTotalLength();
    const speed = 13; // 5 seconds
    const zoomFactor = 0.5;

    const originalViewBox = svg.viewBox.baseVal;
    const originalWidth = originalViewBox.width;
    const originalHeight = originalViewBox.height;

    let isUserInteracting = false;
    let interactionTimeout;

    svg.addEventListener("mousedown", () => setUserInteracting(true));
    svg.addEventListener("mouseup", () => setUserInteracting(false));
    svg.addEventListener("touchstart", () => setUserInteracting(true));
    svg.addEventListener("touchend", () => setUserInteracting(false));
    svg.addEventListener("wheel", () => setUserInteracting(true));

    function setUserInteracting(interacting) {
        isUserInteracting = interacting;
        if (interacting) {
            clearTimeout(interactionTimeout);
        } else {
            interactionTimeout = setTimeout(() => {
                isUserInteracting = false;
            }, 2000);
        }
    }

    let circle = svg.querySelector(".moving-circle");
    if (!circle) {
        circle = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "circle"
        );
        circle.setAttribute("class", "moving-circle");
        circle.setAttribute("r", "1.5");
        circle.setAttribute("fill", "#da9849");
        svg.appendChild(circle);
    }

    let triangle = svg.querySelector(".direction-triangle");
    if (!triangle) {
        triangle = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "polygon"
        );
        triangle.setAttribute("class", "direction-triangle");
        triangle.setAttribute("fill", "#da9849");
        svg.appendChild(triangle);
    }

    function updateTrianglePosition(x, y, angle) {
        const size = 1; // Size of the triangle

        // Calculate the offset (5px in the direction of movement)
        const offsetX = Math.cos((angle * Math.PI) / 180) * 3.5;
        const offsetY = Math.sin((angle * Math.PI) / 180) * 3.5;

        // Adjust the triangle's position to be in front of the circle
        const triangleX = x + offsetX;
        const triangleY = y + offsetY;

        // Define the points of the triangle relative to its center
        const point1 = `${triangleX},${triangleY - size}`; // Top
        const point2 = `${triangleX - size},${triangleY + size}`; // Bottom-left
        const point3 = `${triangleX + size},${triangleY + size}`; // Bottom-right

        // Set the triangle's points
        triangle.setAttribute("points", `${point1} ${point2} ${point3}`);

        // Rotate the triangle (add 90 degrees to align correctly)
        const adjustedAngle = angle + 90;
        triangle.setAttribute(
            "transform",
            `rotate(${adjustedAngle}, ${triangleX}, ${triangleY})`
        );
    }

    const startTime = performance.now();

    function animate(timestamp) {
        const elapsed = timestamp - startTime;
        const distance = Math.min((elapsed / 1000) * speed, pathLength); // Speed in distance per second
        const progress = distance / pathLength;
        const point = pathElement.getPointAtLength(distance);

        circle.setAttribute("cx", point.x);
        circle.setAttribute("cy", point.y);

        // Calculate the angle of movement (in degrees)
        const nextPoint = pathElement.getPointAtLength(
            Math.min(distance + 1, pathLength)
        );
        const angle =
            (Math.atan2(nextPoint.y - point.y, nextPoint.x - point.x) * 180) /
            Math.PI;

        // Update the triangle's position and rotation
        updateTrianglePosition(point.x, point.y, angle);

        const zoomedWidth = originalWidth * zoomFactor;
        const zoomedHeight = originalHeight * zoomFactor;

        if (!isUserInteracting) {
            const viewBoxX = point.x - zoomedWidth / 2;
            const viewBoxY = point.y - zoomedHeight / 2;

            svg.setAttribute(
                "viewBox",
                `${viewBoxX} ${viewBoxY} ${zoomedWidth} ${zoomedHeight}`
            );
        }

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            const boundingBox = svg.getBBox();
            const contentWidth = boundingBox.width;
            const contentHeight = boundingBox.height;
            const contentX = boundingBox.x;
            const contentY = boundingBox.y;

            svg.setAttribute(
                "viewBox",
                `${contentX} ${contentY} ${contentWidth} ${contentHeight}`
            );
        }
    }

    requestAnimationFrame(animate);
}

document.querySelector(".btn").addEventListener("click", drawRoute);
