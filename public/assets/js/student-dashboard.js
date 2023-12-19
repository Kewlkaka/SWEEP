let crsr = document.getElementById('cursorpointer');
let studentdashboard = document.getElementById('studentdashboard');

studentdashboard.addEventListener('mousemove',function(dets){
    crsr.style.left=dets.x+"px";
    crsr.style.top=dets.y+"px";
    
})

let cardArrows = document.querySelectorAll('.cardarrow');
let infoContainers = document.querySelectorAll('.infocontainer');

cardArrows.forEach(arrow => {
    arrow.addEventListener('click', function () {
       
        let targetContainerId = arrow.getAttribute('data-target');

       
        infoContainers.forEach(container => {
            container.style.transition = 'opacity 0.5s'; 
            container.style.opacity = '0';
        });

        setTimeout(() => {
            infoContainers.forEach(container => {
                container.style.display = 'none';
                container.style.opacity = '1';
            });

            document.getElementById(targetContainerId).style.display = 'block';
        }, 300); 
    });
});

