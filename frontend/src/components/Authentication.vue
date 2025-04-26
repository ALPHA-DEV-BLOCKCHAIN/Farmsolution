<template>
    <v-container fluid class="login-container">
      <v-row class="fill-height">
        <!-- Left Side: Login Form -->
        <v-col cols="12" md="6" class="form-section">
          <div class="form-content">
            <h1 class="logo">Farming Solutions</h1>
            <p class="tagline">Revolutionize Farm technology</p>
  
            <div class="auth-toggle">
                <v-btn class="btn-active">Sign Up</v-btn>
                <v-btn class="btn-outline">Log In</v-btn>

            </div>
  
            <h2 class="form-title"></h2>
  
            <p class="social-login">Sign Up with</p>
            <div class="social-icons">
                <div class="social-icons">
                    <v-btn class="social-btn"><v-icon>mdi-apple</v-icon></v-btn>
                    <v-btn class="social-btn"><v-icon>mdi-google</v-icon></v-btn>
                    <v-btn class="social-btn"><v-icon>mdi-twitter</v-icon></v-btn>
                </div>

            </div>
  
            <p class="divider">or</p>
  
            <!-- Input Fields -->
            <v-text-field label="Username" variant="outlined" class="input-field"></v-text-field>
            <v-text-field label="Email" variant="outlined" class="input-field"></v-text-field>
            <v-text-field
              label="Password"
              variant="outlined"
              :type="showPassword ? 'text' : 'password'"
              class="input-field"
              append-inner-icon="mdi-eye"
              @click:append-inner="togglePassword"
            ></v-text-field>
  
            <!-- Remember Me Checkbox -->
            <v-checkbox label="Remember Me" class="remember-checkbox"></v-checkbox>
  
            <!-- Submit Button -->
            <v-btn class="submit-btn">Sign Up</v-btn>
          </div>
        </v-col>
  
        <!-- Right Side: Image Section -->
        <v-col cols="12" md="6" class="image-section">
          <div class="image-overlay">
            <h3>Get your space into new farming technologies </h3>
            <p>Get real time updates, solutions and suggestions for improved quality and quantity of farming products</p>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const showPassword = ref(false);
  
  const togglePassword = () => {
    showPassword.value = !showPassword.value;
  };
  </script>
  
  <style scoped>
  /* Make Page Scrollable */
.login-container {
  min-height: 100vh; /* Allows content to grow beyond the viewport */
  display: flex;
  flex-direction: column; /* Ensures content stacks properly */
  overflow-y: auto; /* Enables vertical scrolling */
}

/* Left Section */
.form-section {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px;
  flex-grow: 1; /* Allows section to expand */
}

/* Right Section */
.image-section {
  background: url('C:\Users\PC\OneDrive\Desktop\Farm\FarmSolutions\public\Images\Authentication.jpg') no-repeat center center/cover;
  position: relative;
  min-height: 100vh; /* Ensures full height */
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  border-radius: 30px 30px 30px 30px;
}

/* Make form content properly scrollable */
.form-content {
  max-width: 400px;
  text-align: center;
  overflow-y: auto; /* Enables scrolling inside form if necessary */
  max-height: 90vh; /* Prevents excessive stretching */
}
.image-overlay h3 {
  font-size: 40px; /* Adjust font size */
  color: white; /* Change font color */
  font-weight: bold;
  font-style: serif;
  padding-bottom: 5%;
}

.image-overlay p {
  font-size: 20px; /* Adjust font size */
  color: white; /* Change font color */
}
/* Change the color of the active button */
.btn-active {
  background-color: #012209; /* Green color */
  color: white; /* Text color */
  border: none;
  margin-right: 5%;
  margin-bottom: 1%;
}

/* Change the outline button color */
.btn-outline {
  background-color: #012209; /* Green border */
  color: white;
  border: none; 
  margin-bottom: 1%;
}

/* Add hover effect */
.btn-active:hover {
  background-color: #04681a; /* Darker green */
}

.btn-outline:hover {
  background-color: #04681a; /* Green background */
  color: white; /* White text */
}
.submit-btn {
    background-color: #012209;
    color: white;
}
.submit-btn:hover {
    background-color: #04681a; /* Green background */
  color: white; /* White text */ 
}
.social-btn:hover {
  background: #f0f0f0; /* Light gray on hover */
}

  </style>
  