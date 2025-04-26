<template>
    <v-app>
      <v-main>
        <v-container fluid class="fill-height d-flex align-center hero-section">
          <v-row class="fill-height" no-gutters>
        
            <v-col cols="12" md="6" class="d-flex align-center">
              <div class="text-left">
                <h5 class="text-orange font-weight-bold">EMPOWERING MODERN AGRICULTURE</h5>
                <h1 class="font-weight-bold">
                  Revolutionizing Agriculture with
                  <span class="text-green">Smart Technology</span>
                </h1>
                <p class="text-grey">
                  Empowering farmers with data-driven insights, automation, and sustainable
                  solutions to boost productivity and efficiency.
                </p>
                <v-btn color="green" class="mr-3" rounded>
                  Explore Innovative Solutions
                </v-btn>
                <v-btn variant="outlined" rounded>
                  ▶ Watch How it Works
                </v-btn>
                <div class="mt-5 d-flex align-center">
                  <v-avatar-group>
                    <v-avatar v-for="(user, index) in users" :key="index" size="40">
                      <v-img :src="user.img"></v-img>
                    </v-avatar>
                  </v-avatar-group>
                  <div class="ml-3">
                    <span class="text-grey">Join us in shaping the future of farming.</span>
                  </div>
                </div>
              </div>
            </v-col>
  
            
            <v-col cols="12" md="6" class="d-flex align-center justify-center image-container">
              <v-img src="/farmers.png" contain class="full-image"></v-img>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script setup>
  const users = [
    { img: "https://randomuser.me/api/portraits/women/1.jpg" },
    { img: "https://randomuser.me/api/portraits/men/2.jpg" },
    { img: "https://randomuser.me/api/portraits/women/3.jpg" },
  ];
  </script>
  
  <style>
  .hero-section {
    height: 100vh;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0)), url('/public/Images/download.jpg');
    background-size: cover;
    background-position: center;
    color: white;
  }
  
  .full-image {
    max-width: 100%;
    height: auto;
  }
  
  .text-green {
    color: #4caf50;
  }
  </style>
  