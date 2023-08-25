const stars = document.querySelectorAll('.star');
const feedbackTextarea = document.getElementById('feedback');
const submitBtn = document.getElementById('submit-btn');

let selectedRating = 0;

stars.forEach((star, index) => {
  star.addEventListener('click', () => {
    selectedRating = index + 1;
    updateStars();
  });
});

function updateStars() {
  stars.forEach((star, index) => {
    if (index < selectedRating) {
      star.classList.add('active');
    } else {
      star.classList.remove('active');
    }
  });
}

submitBtn.addEventListener('click', () => {
  const feedback = feedbackTextarea.value;
  if (selectedRating > 0 && feedback.trim() !== '') {
    // Lakukan sesuatu dengan nilai rating dan feedback
    alert(`Rating: ${selectedRating}, Feedback: ${feedback}`);
    // Atur ulang form
    selectedRating = 0;
    feedbackTextarea.value = '';
    updateStars();
  } else {
    alert('Please select a rating and provide feedback.');
  }
});
