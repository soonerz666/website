document.addEventListener('DOMContentLoaded', () => {
  const images = [
      "images/Plunge/photo1.jpg",
      "images/Plunge/photo2.jpg",
      "images/Plunge/photo3.jpg",
      "images/Plunge/photo4.jpg",
      "images/Plunge/photo5.jpg",
      "images/Plunge/photo6.jpg"
  ];

  let currentIndex = 0;
  const photoElement = document.getElementById('current-photo');

  // Function to update the image
  const updateImage = () => {
      photoElement.src = images[currentIndex];
  };

  // Next button functionality
  document.getElementById('next').addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % images.length;
      updateImage();
  });

  // Previous button functionality
  document.getElementById('prev').addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateImage();
  });

  // Set initial image
  updateImage();
});
