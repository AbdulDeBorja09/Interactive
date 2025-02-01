@extends('layouts.app')

@section('content')

<div id="svg-container">

    {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
    {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/3Second Floor Plan.svg')) !!}
    {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
</div>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to highlight the path between rooms
        function highlightPath(startRoom, endRoom) {
            const start = document.getElementById(startRoom);
            const end = document.getElementById(endRoom);
            
            if (start && end) {
                // Get the bounding boxes of the start and end rooms
                const startBBox = start.getBBox();
                const endBBox = end.getBBox();
                
                console.log(`Start Room: ${startRoom} - BBox:`, startBBox);
                console.log(`End Room: ${endRoom} - BBox:`, endBBox);

                // Calculate the center of the bounding boxes (midpoint of each room)
                const startX = startBBox.x + startBBox.width / 2;
                const startY = startBBox.y + startBBox.height / 2;
                const endX = endBBox.x + endBBox.width / 2;
                const endY = endBBox.y + endBBox.height / 2;
                
                // Check if any coordinates are NaN
                if (isNaN(startX) || isNaN(startY) || isNaN(endX) || isNaN(endY)) {
                    console.error('Error: One or more coordinates are NaN');
                    return; // Exit if any coordinates are invalid
                }

                // Create a path from the start to the end room (using a line for simplicity)
                const line = document.createElementNS("http://www.w3.org/2000/svg", "path");
                
                // Create a cubic bezier curve or straight line path data
                const pathData = `M${startX},${startY} C${(startX + endX) / 2},${startY} ${(startX + endX) / 2},${endY} ${endX},${endY}`;
                
                line.setAttribute('d', pathData);
                line.setAttribute('stroke', 'red');
                line.setAttribute('stroke-width', '2');
                line.setAttribute('fill', 'none');
                line.setAttribute('class', 'route-line');
                
                // Check if the path data is valid
                console.log("Path Data:", pathData);

                // Get the SVG element directly (not the container)
                const svg = document.querySelector('svg');
                if (svg) {
                    svg.appendChild(line);
                    
                    // Optional: Adjust z-index to make sure path is on top
                    line.style.zIndex = 9999;
                } else {
                    console.error('Error: Could not find the SVG element');
                }
            } else {
                console.error('Error: Could not find start or end room elements');
            }
        }

        // Function to reset all drawn paths
        function resetPaths() {
            const existingPaths = document.querySelectorAll('.route-line');
            existingPaths.forEach(path => path.remove());
        }

        let startRoom = null;
        let endRoom = null;

        // Handle the click event for selecting start and end rooms
        function handleRoomClick(roomId) {
            if (!startRoom) {
                startRoom = roomId;
                document.getElementById(startRoom).setAttribute('fill', 'green'); // Highlight start room
            } else {
                endRoom = roomId;
                document.getElementById(endRoom).setAttribute('fill', 'blue'); // Highlight end room

                // Reset previously drawn paths
                resetPaths();

                // Draw the path from start to end room
                highlightPath(startRoom, endRoom);

                // Reset for next selection
                startRoom = null;
                endRoom = null;
            }
        }

        // Add event listeners for each room
        const roomIds = [
            'room-lg10', 'room-lg11', 'room-lg12', 'room-lg09', 'room-lg08', 'room-lg05', 'room-lg04', 'room-lg02', 'room-lg01', 
            'room-lg27', 'room-lg26', 'room-lg25', 'room-lg24', 'room-lg23', 'room-lg20', 'room-lg19', 'room-lg17', 'room-lg16', 'room-lg14'
        ];

        roomIds.forEach(roomId => {
            const room = document.getElementById(roomId);
            if (room) {
                room.addEventListener('click', function() {
                    handleRoomClick(roomId);
                });
            }
        });
    });
</script> --}}
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to highlight the path between rooms
        function highlightPath(startRoom, endRoom) {
            const start = document.getElementById(startRoom);
            const end = document.getElementById(endRoom);

            if (start && end) {
                // Get the bounding boxes of the start and end rooms
                const startBBox = start.getBBox();
                const endBBox = end.getBBox();
                
                console.log(`Start Room: ${startRoom} - BBox:`, startBBox);
                console.log(`End Room: ${endRoom} - BBox:`, endBBox);

                // Calculate the center of the bounding boxes (midpoint of each room)
                const startX = startBBox.x + startBBox.width / 2;
                const startY = startBBox.y + startBBox.height / 2;
                const endX = endBBox.x + endBBox.width / 2;
                const endY = endBBox.y + endBBox.height / 2;
                
                // Check if any coordinates are NaN
                if (isNaN(startX) || isNaN(startY) || isNaN(endX) || isNaN(endY)) {
                    console.error('Error: One or more coordinates are NaN');
                    return; // Exit if any coordinates are invalid
                }

                // Create a path from the start to the end room (using a line for simplicity)
                const line = document.createElementNS("http://www.w3.org/2000/svg", "path");
                
                // Create a cubic bezier curve or straight line path data
                const pathData = `M${startX},${startY} C${(startX + endX) / 2},${startY} ${(startX + endX) / 2},${endY} ${endX},${endY}`;
                
                line.setAttribute('d', pathData);
                line.setAttribute('stroke', 'red');
                line.setAttribute('stroke-width', '2');
                line.setAttribute('fill', 'none');
                line.setAttribute('class', 'route-line');
                
                // Check if the path data is valid
                console.log("Path Data:", pathData);

                // Get the SVG element directly (not the container)
                const svg = document.querySelector('svg');
                if (svg) {
                    svg.appendChild(line);
                    
                    // Optional: Adjust z-index to make sure path is on top
                    line.style.zIndex = 9999;
                } else {
                    console.error('Error: Could not find the SVG element');
                }
            } else {
                console.error('Error: Could not find start or end room elements');
            }
        }

        // Function to reset all drawn paths
        function resetPaths() {
            const existingPaths = document.querySelectorAll('.route-line');
            existingPaths.forEach(path => path.remove());
        }

        let startRoom = null;
        let endRoom = null;

        // Handle the click event for selecting start and end rooms
        function handleRoomClick(roomId) {
            if (!startRoom) {
                startRoom = roomId;
                document.getElementById(startRoom).setAttribute('fill', 'green'); // Highlight start room
            } else {
                endRoom = roomId;
                document.getElementById(endRoom).setAttribute('fill', 'blue'); // Highlight end room

                // Reset previously drawn paths
                resetPaths();

                // Draw the path from start to end room
                navigateThroughRooms(startRoom, endRoom);

                // Reset for next selection
                startRoom = null;
                endRoom = null;
            }
        }

        // Function to "navigate" through rooms, drawing paths between each intermediate room
        function navigateThroughRooms(startRoom, endRoom) {
            const roomIds = [
                'room-lg10', 'room-lg11', 'room-lg12', 'room-lg09', 'room-lg08', 'room-lg05', 'room-lg04', 'room-lg02', 'room-lg01', 
                'room-lg27', 'room-lg26', 'room-lg25', 'room-lg24', 'room-lg23', 'room-lg20', 'room-lg19', 'room-lg17', 'room-lg16', 'room-lg14'
            ];

            const startIndex = roomIds.indexOf(startRoom);
            const endIndex = roomIds.indexOf(endRoom);

            // If start or end room is not found in the list
            if (startIndex === -1 || endIndex === -1) {
                console.error('Error: Start or End room not found in the room list');
                return;
            }

            // Determine the range of rooms to "navigate" through
            let pathRooms = [];
            if (startIndex < endIndex) {
                pathRooms = roomIds.slice(startIndex, endIndex + 1);
            } else {
                pathRooms = roomIds.slice(endIndex, startIndex + 1).reverse();
            }

            // Iterate through the sequence of rooms and draw paths between each
            for (let i = 0; i < pathRooms.length - 1; i++) {
                highlightPath(pathRooms[i], pathRooms[i + 1]);
            }
        }

        // Add event listeners for each room
        const roomIds = [
            'room-lg10', 'room-lg11', 'room-lg12', 'room-lg09', 'room-lg08', 'room-lg05', 'room-lg04', 'room-lg02', 'room-lg01', 
            'room-lg27', 'room-lg26', 'room-lg25', 'room-lg24', 'room-lg23', 'room-lg20', 'room-lg19', 'room-lg17', 'room-lg16', 'room-lg14'
        ];

        roomIds.forEach(roomId => {
            const room = document.getElementById(roomId);
            if (room) {
                room.addEventListener('click', function() {
                    handleRoomClick(roomId);
                });
            }
        });
    });
</script> --}}
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to highlight the path through hallways
        function highlightPath(room1, room2, hallwayId) {
            const startRoom = document.getElementById(room1);
            const endRoom = document.getElementById(room2);
            const hallway = document.querySelector(`[data-name="${hallwayId}"]`);

            if (startRoom && endRoom && hallway) {
                // Get the bounding boxes of the rooms and hallway
                const startBBox = startRoom.getBBox();
                const endBBox = endRoom.getBBox();
                const hallwayBBox = hallway.getBBox();

                console.log(`Start Room: ${room1} - BBox:`, startBBox);
                console.log(`End Room: ${room2} - BBox:`, endBBox);
                console.log(`Hallway: ${hallwayId} - BBox:`, hallwayBBox);

                // Calculate the center of the bounding boxes (midpoint of each room and hallway)
                const startX = startBBox.x + startBBox.width / 2;
                const startY = startBBox.y + startBBox.height / 2;
                const endX = endBBox.x + endBBox.width / 2;
                const endY = endBBox.y + endBBox.height / 2;
                const hallwayX = hallwayBBox.x + hallwayBBox.width / 2;
                const hallwayY = hallwayBBox.y + hallwayBBox.height / 2;

                // Check if any coordinates are NaN
                if (isNaN(startX) || isNaN(startY) || isNaN(endX) || isNaN(endY) || isNaN(hallwayX) || isNaN(hallwayY)) {
                    console.error('Error: One or more coordinates are NaN');
                    return; // Exit if any coordinates are invalid
                }

                // Create a path from the start room to the hallway and then to the end room
                const line = document.createElementNS("http://www.w3.org/2000/svg", "path");
                
                // Create a cubic bezier curve or straight line path data
                const pathData = `M${startX},${startY} C${(startX + hallwayX) / 2},${startY} ${(startX + hallwayX) / 2},${hallwayY} ${hallwayX},${hallwayY} C${(hallwayX + endX) / 2},${hallwayY} ${(hallwayX + endX) / 2},${endY} ${endX},${endY}`;
                
                line.setAttribute('d', pathData);
                line.setAttribute('stroke', 'red');
                line.setAttribute('stroke-width', '2');
                line.setAttribute('fill', 'none');
                line.setAttribute('class', 'route-line');
                
                // Check if the path data is valid
                console.log("Path Data:", pathData);

                // Get the SVG element directly (not the container)
                const svg = document.querySelector('svg');
                if (svg) {
                    svg.appendChild(line);
                    
                    // Optional: Adjust z-index to make sure path is on top
                    line.style.zIndex = 9999;
                } else {
                    console.error('Error: Could not find the SVG element');
                }
            } else {
                console.error('Error: Could not find start or end room elements, or hallway');
            }
        }

        // Function to reset all drawn paths
        function resetPaths() {
            const existingPaths = document.querySelectorAll('.route-line');
            existingPaths.forEach(path => path.remove());
        }

        let startRoom = null;
        let endRoom = null;

        // Handle the click event for selecting start and end rooms
        function handleRoomClick(roomId) {
            if (!startRoom) {
                startRoom = roomId;
                document.getElementById(startRoom).setAttribute('fill', 'green'); // Highlight start room
            } else {
                endRoom = roomId;
                document.getElementById(endRoom).setAttribute('fill', 'blue'); // Highlight end room

                // Reset previously drawn paths
                resetPaths();

                // Get the hallways between the start and end room
                navigateThroughHallways(startRoom, endRoom);

                // Reset for next selection
                startRoom = null;
                endRoom = null;
            }
        }

        // Function to navigate through all hallways between start and end rooms
        function navigateThroughHallways(startRoom, endRoom) {
            const hallways = document.querySelectorAll('.hallway'); // Assuming all hallways have the "hallway" class

            let currentRoom = startRoom;
            const visitedRooms = new Set();

            // Ensure we don't revisit rooms
            while (currentRoom !== endRoom) {
                visitedRooms.add(currentRoom);
                const nextHallway = getNextHallway(currentRoom, hallways, visitedRooms);
                
                if (nextHallway) {
                    const nextRoom = nextHallway.getAttribute('data-destination'); // Assuming "data-destination" holds the room ID
                    highlightPath(currentRoom, nextRoom, nextHallway.getAttribute('data-name'));
                    currentRoom = nextRoom;
                } else {
                    console.error('Error: No path found between rooms');
                    break;
                }
            }
        }

        // Helper function to get the next hallway between two rooms
        function getNextHallway(currentRoom, hallways, visitedRooms) {
            for (let i = 0; i < hallways.length; i++) {
                const hallway = hallways[i];
                const room1 = hallway.getAttribute('data-room');
                const room2 = hallway.getAttribute('data-room');

                // Find a hallway connecting the current room to an unvisited room
                if (currentRoom === room1 && !visitedRooms.has(room2)) {
                    return hallway;
                } else if (currentRoom === room2 && !visitedRooms.has(room1)) {
                    return hallway;
                }
            }
            return null; // If no valid hallway is found, return null
        }

        // Add event listeners for each room
        const roomIds = [
            'room-lg10', 'room-lg11', 'room-lg12', 'room-lg09', 'room-lg08', 'room-lg05', 'room-lg04', 'room-lg02', 'room-lg01', 
            'room-lg27', 'room-lg26', 'room-lg25', 'room-lg24', 'room-lg23', 'room-lg20', 'room-lg19', 'room-lg17', 'room-lg16', 'room-lg14'
        ];

        roomIds.forEach(roomId => {
            const room = document.getElementById(roomId);
            if (room) {
                room.addEventListener('click', function() {
                    handleRoomClick(roomId);
                });
            }
        });
    });
</script> --}}








@endsection