//Base UI Updates:
//Sidebar:
function initializeSidebar() {
    //Sidebar
    let menuicn = document.getElementById("menuIcn");
    let nav = document.querySelector(".navcontainer");
    let navIcon = document.querySelectorAll(".iconOpen");

    menuicn.addEventListener("click", () => {
        nav.classList.toggle("navclose");
        for (let i = 0; i < navIcon.length; i++) {
            navIcon[i].classList.toggle("iconClose");
        }
    }); 

    let sidebarTab = document.querySelectorAll(".nav-option"); 
    const profileSection = document.querySelector(".profileSection"); //main
    const taskCreatorSection = document.querySelector(".taskCreator"); 
    const taskViewerSection = document.querySelector(".taskViewer"); 
    const findSection = document.querySelector(".find"); 
    const teamSection = document.querySelector(".team"); 
    const chatSection = document.querySelector(".chat"); 
    let selectedTabIndex = 0;

    let contentSections = document.querySelectorAll(".profileSection > div");

    function handleTabClick(tabIndex) {

        sidebarTab.forEach((tab, index) => {
            if (index === tabIndex) {
                tab.classList.add("selected");
            } else {
                tab.classList.remove("selected");
            } 
        });

        if(tabIndex === 0) {
            profileSection.classList.toggle("selected-section", tabIndex === 0);
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 1) {
            taskCreatorSection.classList.toggle("selected-section", tabIndex === 1);
            profileSection.classList.value = "profileSection";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 2) {
            taskViewerSection.classList.toggle("selected-section", tabIndex === 2);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 3) {
            findSection.classList.toggle("selected-section", tabIndex === 3);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            teamSection.classList.value = "team";
            chatSection.classList.value = "chat";
        } else if (tabIndex === 4) {
            teamSection.classList.toggle("selected-section", tabIndex === 4);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            chatSection.classList.value = "chat";
        } else {
            chatSection.classList.toggle("selected-section", tabIndex === 5);
            profileSection.classList.value = "profileSection";
            taskCreatorSection.classList.value = "taskCreator";
            taskViewerSection.classList.value = "taskViewer";
            findSection.classList.value = "find";
            teamSection.classList.value = "team";
        }

        selectedTabIndex = tabIndex;
        
    }

    sidebarTab.forEach((sidebarTab, index) => {
        sidebarTab.addEventListener("click", () => {
            console.log(index);
            handleTabClick(index);
        }); 
    });

    handleTabClick(selectedTabIndex);
}

initializeSidebar();