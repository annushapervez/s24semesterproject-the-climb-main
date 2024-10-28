
const cardioModal = document.getElementById('cardiomodal');
const exerciseModal = document.getElementById('exercisemodal');
const goalModal =document.getElementById('goalmodal')

//const openMuscle = document.getElementById('muscle-button');
const openCardio = document.getElementById('cardio-button');
const openExercise = document.getElementById('exercise-button');
const openGoal = document.getElementById('weekly-goal-button');

// close buttons
const closeCardio = document.getElementById('close-cardio');
const closeExercise = document.getElementById('close-exercise');
const closeGoal = document.getElementById('close-weekly-goal');


openCardio.addEventListener('click', () => {
    cardioModal.showModal();
})
openExercise.addEventListener('click', () => {
    exerciseModal.showModal();
})
openGoal.addEventListener('click', () => {
    goalModal.showModal();
})
closeCardio.addEventListener('click', () => {
    cardioModal.close();
})
closeExercise.addEventListener('click', () => {
    exerciseModal.close();
})
closeGoal.addEventListener('click', () => {
    goalModal.close();
})
