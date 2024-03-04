//show and hide
 
export function showProject() {
    
    fetch('getProject.php')
        .then(response => response.json())
        .then(data => {
            const galleryContainer = document.querySelector('#project-gallery');
            data.forEach(project => {
                
                const projectDiv = document.createElement('div');
                projectDiv.id = `project-${project.ID}`; 
                projectDiv.className = `gallery-box ${project.project_type}`; 
                projectDiv.innerHTML = `
                <h3 class="project-title">「 ${project.project_title} 」</h3>
                <a href="${project.project_url}" class="project">
                    <img class="gallery-image" src="images/${project.project_image}" alt="${project.project_title}">
                </a>
            `; 

                galleryContainer.appendChild(projectDiv);
            });
            show();
        })
        .catch(error => console.error('Error:', error));


    
    function show() {


    

        const allButton = document.querySelector('#all');
        const codeButton = document.querySelector('#code');
        const designButton = document.querySelector('#design');

        const allProjects = document.querySelectorAll('.gallery-box');
        const codeProjects = document.querySelectorAll('.code');
        const designProjects = document.querySelectorAll('.design');

        function hideAllProjects() {
            allProjects.forEach(project => {
                project.style.display = 'none';
            });
        }

        function showAllProjects() {
            allProjects.forEach(project => {
                project.style.display = 'block';
            });
        }

        function showCodeProjects() {
            hideAllProjects();
            codeProjects.forEach(project => {
                project.style.display = 'block';
            });
        }

        function showDesignProjects() {
            hideAllProjects();
            designProjects.forEach(project => {
                project.style.display = 'block';
            });
        }

        allButton.addEventListener('click', showAllProjects);
        codeButton.addEventListener('click', showCodeProjects);
        designButton.addEventListener('click', showDesignProjects);
    }


    
}