<template>
    <v-container class="py-10 text-center">
      <!-- Header Section -->
      <v-row justify="center">
        <v-col cols="12">
          <h6 class="text-orange font-weight-bold">HOW IT WORKS</h6>
          <h2 class="font-weight-bold">
            Empowering Farmers with <span class="text-green">Innovative Solutions</span>
          </h2>
          <p class="text-grey">
            Empowering farmers and agribusinesses with cutting-edge technology to boost productivity, sustainability, and 
            profitability. Discover how our solutions transform your farming operations for a better tomorrow.
          </p>
        </v-col>
      </v-row>
  
      <!-- Process Flow with Background Image -->
      <v-row justify="center" class="mt-5">
        <v-col cols="12">
          <div class="process-container">
            <v-img src="/how-it-works-bg.jpg" class="process-bg"></v-img>
            <div class="process-steps">
              <v-avatar size="80" v-for="(step, index) in steps" :key="index" class="step-icon">
                <v-img :src="step.icon"></v-img>
              </v-avatar>
            </div>
          </div>
        </v-col>
      </v-row>
  
      <!-- Step Details -->
      <v-row class="mt-5" justify="center">
        <v-col cols="12" md="3" v-for="(step, index) in steps" :key="index">
          <v-card class="step-card pa-5" elevation="3">
            <h3 class="font-weight-bold">{{ step.number }}. {{ step.title }}</h3>
            <p class="text-grey">{{ step.description }}</p>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const steps = ref([
    {
      number: "1",
      title: "Monitor Your Fields",
      description: "Use our sensors and satellite imagery to track soil health, moisture levels, and crop growth in real-time.",
      icon: "/public/icons/smartphone.png",
    },
    {
      number: "2",
      title: "Analyze Data",
      description: "Our platform provides easy-to-understand analytics, offering actionable insights on crops.",
      icon: "/public/icons/monitor.png",
    },
    {
      number: "3",
      title: "Informed Decisions",
      description: "Get personalized recommendations on irrigation, fertilization, and pest management to optimize yields.",
      icon: "/public/icons/optimizing.png",
    },
    {
      number: "4",
      title: "Track and Improve",
      description: "Monitor your progress and adjust strategies based on data-driven results, helping you farm smarter.",
      icon: "/public/icons/growth.png",
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
  
  .process-container {
    position: relative;
    text-align: center;
  }
  
  .process-bg {
    height: 250px;
    border-radius: 10px;
  }
  
  .process-steps {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80%;
    display: flex;
    justify-content: space-between;
    transform: translate(-50%, -50%);
  }
  
  .step-icon {
    background: #fff;
    border: 2px solid #4caf50;
  }
  
  .step-card {
    border-radius: 15px;
    text-align: left;
  }
  </style>
  