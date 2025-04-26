<template>
    <v-container class="testimonial-section">
      <!-- Heading -->
      <div class="text-center">
        <p class="testimonial-title">TESTIMONIAL</p>
        <h2 class="testimonial-heading">
          What Our Clients <span class="highlight">Are Saying</span>
        </h2>
        <p class="testimonial-subtext">
          Empowering farmers and agribusinesses with cutting-edge technology to boost productivity, sustainability, and profitability.
        </p>
      </div>
  
      <!-- Carousel -->
      <v-carousel hide-delimiters show-arrows>
        <v-carousel-item v-for="(testimonial, index) in testimonials" :key="index">
          <div class="testimonial-card">
            <v-img :src="testimonial.image" class="testimonial-img" contain></v-img>
            <p class="testimonial-text">"{{ testimonial.text }}"</p>
            <div class="rating">
              <v-icon v-for="star in 5" :key="star" color="orange">mdi-star</v-icon>
            </div>
            <p class="testimonial-name">~ {{ testimonial.name }}</p>
          </div>
        </v-carousel-item>
      </v-carousel>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Testimonial Data
  const testimonials = ref([
    {
      name: "MARIA HERNANDEZ",
      text: "Implementing this technology has transformed our crop yields. We’ve reduced water consumption by 30% and increased productivity by 20%! Highly recommended.",
      image: "/public/Images/Farmer1.jpg"
    },
    {
      name: "MICHAEL SMITH",
      text: "The automation tools have allowed me to monitor soil health in real-time. This technology is the future of sustainable farming. The data insights we now have are priceless.",
      image: "/public/Images/Farmer2.jpg"
    },
    {
      name: "OLIVIER DUPONT",
      text: "The data insights we now have are priceless. I can make better decisions for my farm, leading to higher profits and a smaller carbon footprint.",
      image: "/public/Images/Farmer3.jpg"
    }
  ]);
  </script>
  
  <style scoped>
  /* Main Container */
  .testimonial-section {
    text-align: center;
    padding: 50px 20px;
    background-color: #fff;
  }
  
  /* Titles */
  .testimonial-title {
    color: orange;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
  }
  
  .testimonial-heading {
    font-size: 32px;
    font-weight: bold;
  }
  
  .highlight {
    color: #2ca04c;
  }
  
  /* Subtext */
  .testimonial-subtext {
    max-width: 700px;
    margin: 0 auto;
    color: gray;
  }
  
  /* Testimonial Cards */
  .testimonial-card {
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 500px;
    margin: auto;
  }
  
  .testimonial-img {
    width: 100%;
    height: 200px;
    border-radius: 10px;
    object-fit: cover;
  }
  
  .testimonial-text {
    font-size: 16px;
    margin: 15px 0;
    color: #333;
  }
  
  /* Rating */
  .rating {
    margin: 10px 0;
  }
  
  /* Name */
  .testimonial-name {
    font-weight: bold;
    color: #2ca04c;
  }
  </style>
  