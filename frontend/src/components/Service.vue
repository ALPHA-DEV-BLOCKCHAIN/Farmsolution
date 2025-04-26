<template>
    <v-container class="py-10 text-center">
      <v-row justify="center">
        <v-col cols="12">
          <h6 class="text-orange font-weight-bold">OUR SERVICES</h6>
          <h2 class="font-weight-bold">
            Our Innovative Agriculture <span class="text-green">Tech Solutions</span>
          </h2>
          <p class="text-grey">
            Empowering farmers and agribusinesses with cutting-edge technology to boost productivity, sustainability, and 
            profitability. Discover how our solutions transform your farming operations for a better tomorrow.
          </p>
        </v-col>
      </v-row>
  
      <v-row class="mt-5" justify="center">
        <v-col cols="12" md="4" v-for="(service, index) in services" :key="index">
          <v-card class="service-card pa-5" elevation="3">
            <v-img :src="service.image" class="service-img mb-4" cover></v-img>
            <v-avatar size="50" class="service-icon">
              <v-img :src="service.icon"></v-img>
            </v-avatar>
            <h3 class="font-weight-bold">{{ service.title }}</h3>
            <p class="text-grey">{{ service.description }}</p>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const services = ref([
    {
      title: "Precision Farming",
      description: "Utilize advanced GPS and IoT technologies for real-time field monitoring and efficient resource management.",
      image: "/public/Images/Precisionfarming.jpg",
      icon: "/public/Images/Precisionfarming.jpg",
    },
    {
      title: "Smart Irrigation Systems",
      description: "Optimize water usage with automated, data-driven irrigation solutions to save water and increase crop yields.",
      image: "/public/Images/Smart Irrigation.jpg",
      icon: "/public/Images/Smart Irrigation.jpg",
    },
    {
      title: "Drones for Crop Monitoring",
      description: "Get detailed aerial insights on crop health, growth stages, and pest issues, minimizing field inspections and improving decision-making.",
      image: "/public/Images/Drone monitoring.jpg",
      icon: "/public/Images/Drone monitoring.jpg",
    },
  ]);
  </script>
  
  <style scoped>
  .text-orange {
    color: #f57c00;
  }
  
  .text-green {
    color: #4caf50;
  }
  
  .service-card {
    border-radius: 15px;
    text-align: center;
  }
  
  .service-img {
    height: 180px;
    border-radius: 10px;
  }
  
  .service-icon {
    background: #fff;
    border: 2px solid #4caf50;
    margin-top: -30px;
  }
  </style>
  