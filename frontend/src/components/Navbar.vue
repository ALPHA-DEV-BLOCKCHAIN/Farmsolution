
  <template>
    <v-app-bar :elevation="5" color="white" >
  <template v-slot:prepend>
    <v-app-bar-nav-icon></v-app-bar-nav-icon> 
  </template>
  
  <v-app-bar-title>Farm Solutions</v-app-bar-title>
  <v-btn to="/">Home</v-btn>
  <v-btn to="/Features">Features</v-btn>
  <v-btn to="/Service">Services</v-btn>
  <v-btn to="/Testimonial">Testimonial</v-btn>
  <v-btn to="/Authentication">Get Started</v-btn>
  </v-app-bar>
  </template>