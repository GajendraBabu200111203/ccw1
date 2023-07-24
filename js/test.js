const form = document.getElementById('career-test-form');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    // Retrieve selected data
    const selectedSubjects = Array.from(document.querySelectorAll('input[name="subject"]:checked')).map(input => input.value);
    const selectedActivities = Array.from(document.querySelectorAll('input[name="activity"]:checked')).map(input => input.value);
    const selectedEnvironment = document.querySelector('input[name="environment"]:checked').value;
    const selectedProblemSolving = document.querySelector('input[name="problem-solving"]:checked').value;
    const selectedChallenges = Array.from(document.querySelectorAll('input[name="challenges"]:checked')).map(input => input.value);
    const selectedIndustry = Array.from(document.querySelectorAll('input[name="industry"]:checked')).map(input => input.value);
    const selectedMotivation = Array.from(document.querySelectorAll('input[name="motivation"]:checked')).map(input => input.value);
    const selectedPublicSpeaking = document.querySelector('input[name="public-speaking"]:checked').value;
    const selectedWorkSchedule = document.querySelector('input[name="work-schedule"]:checked').value;
    const selectedLeadingTeam = document.querySelector('input[name="leading-team"]:checked').value;

    // Combine selected data into a string
    const dataString = `Selected Subjects: ${selectedSubjects}\n` +
                       `Selected Activities: ${selectedActivities}\n` +
                       `Selected Environment: ${selectedEnvironment}\n` +
                       `Selected Problem Solving: ${selectedProblemSolving}\n` +
                       `Selected Challenges: ${selectedChallenges}\n` +
                       `Selected Industry: ${selectedIndustry}\n` +
                       `Selected Motivation: ${selectedMotivation}\n` +
                       `Selected Public Speaking: ${selectedPublicSpeaking}\n` +
                       `Selected Work Schedule: ${selectedWorkSchedule}\n` +
                       `Selected Leading Team: ${selectedLeadingTeam}\n`;

    // Create a Blob with the data
    const blob = new Blob([dataString], { type: 'text/plain' });

    // Create a temporary anchor element to download the file
    const anchor = document.createElement('a');
    anchor.href = URL.createObjectURL(blob);
    anchor.download = 'career_test_results.txt';
    anchor.click();

    // Reset the form after submission
    form.reset();
});
