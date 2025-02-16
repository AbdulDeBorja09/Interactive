@extends('layouts.app')

@section('content')

<div id="svg-container">
    {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
    {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/3SecondFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
</div>

{{-- 
<script>
    const svgContainer = document.getElementById('svg-container');
    const allSVGs = svgContainer.querySelectorAll('.floor-svg'); // Select all SVGs by class
    const circleContainer = document.getElementById('circle-container');

    let activeIndex = 0; // Start with the first SVG
    let progress = 0; // Progress along the path

    // Hide all SVGs except the active one
    function activateSVG(index) {
        allSVGs.forEach((svg, i) => {
            svg.style.display = i === index ? 'block' : 'none';
        });
    }

    // Animate a specific path inside an SVG
    function animatePath(svgElement, pathSelector, onComplete) {
        const path = svgElement.querySelector(pathSelector);
        if (!path) return;

        const pathLength = path.getTotalLength();

        function animate() {
            progress += 0.002; // Adjust speed

            if (progress > 1) {
                progress = 0;
                if (onComplete) onComplete();
                return;
            }

            const point = path.getPointAtLength(progress * pathLength);

            // Zoom and center the path point
            svgElement.style.transform = `translate(${-point.x + window.innerWidth / 2}px, ${-point.y + window.innerHeight / 2}px) scale(2)`;

            requestAnimationFrame(animate);
        }

        animate();
    }

    // Start navigation for a specific floor
    function navigateFloor(index) {
        if (index < 0 || index >= allSVGs.length) return;

        const activeSVG = allSVGs[index];
        activateSVG(index); // Show only the current SVG

        animatePath(activeSVG, 'path', () => {
            // When the path animation completes, move to the next floor
            navigateFloor(index + 1);
        });
    }

    // Initialize: Start from the first SVG
    navigateFloor(activeIndex);
</script> --}}
@endsection