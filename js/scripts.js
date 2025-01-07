const courses = {
    "100": ["Introduction to Programming", "Basic Mathematics", "General Physics"],
    "200": ["Data Structures", "Calculus II", "Physics II"],
    "300": ["Algorithms", "Numerical Methods", "System Analysis and Design"],
    "400": ["Artificial Intelligence", "Machine Learning", "Compiler Construction II"]
};
function updateCourses() {
    const level = document.getElementById('level').value;
    const courseSelect = document.getElementById('course');
    courseSelect.innerHTML = '';

    if (level) {
        courses[level].forEach(course => {
            const option = document.createElement('option');
            option.value = course;
            option.textContent = course;
            courseSelect.appendChild(option);
        });
    }
}
/*
document.getElementById('studentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    // Add any form validation logic here if needed
    window.location.href = 'thank_you.html'; // Redirect to the thank you page
});
*/