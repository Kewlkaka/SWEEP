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

document.addEventListener('DOMContentLoaded', function () {
        
        var taskHistoryDiv = document.getElementById('taskhistory');
        var notificationsDiv = document.getElementById('notificationsdiv');
        var closeButton = document.getElementById('close');
        var profileLink = document.querySelectorAll('.sidebar a')[0];
        var taskHistoryLink = document.querySelectorAll('.sidebar a')[1];
        var notificationsLink = document.querySelectorAll('.sidebar a')[2];

        
        taskHistoryLink.addEventListener('click', function (event) {
            event.preventDefault();

            notificationsDiv.style.display='none';
            taskHistoryDiv.style.display = 'block';
        });
        
        notificationsLink.addEventListener('click', function (event) {
            event.preventDefault();

            notificationsDiv.style.display='block';
            taskHistoryDiv.style.display = 'none';
        });

        profileLink.addEventListener('click', function (event) {
            event.preventDefault();
            
            taskHistoryDiv.style.display = 'none';
           notificationsDiv.style.display='none';
        });
        
        closeButton.addEventListener('click', function () {
            
            taskHistoryDiv.style.display = 'none';
        }); 

    });

