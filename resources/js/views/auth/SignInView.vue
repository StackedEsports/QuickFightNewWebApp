<script setup>
import { reactive, computed } from "vue";
import { useRouter } from "vue-router";
import { useTemplateStore } from "@/stores/template";
import axios from 'axios';

// Vuelidate, for more info and examples you can check out https://github.com/vuelidate/vuelidate
import useVuelidate from "@vuelidate/core";
import { required, minLength } from "@vuelidate/validators";

// Main store and Router
const store = useTemplateStore();
const router = useRouter();

// Input state variables
const state = reactive({
  username: null,
  password: null,
});

// Validation rules
const rules = computed(() => {
  return {
    username: {
      required,
      minLength: minLength(3),
    },
    password: {
      required,
      minLength: minLength(5),
    },
  };
});

// Use vuelidate
const v$ = useVuelidate(rules, state);

// On form submission
async function onSubmit() {
  console.log("submitting");
  const result = await v$.value.$validate();

  if (!result) {
    // notify user form is invalid
    console.error("Form validation failed.");
    return;
  }

  // Prepare the credentials
  const credentials = {
    email: state.username, // Assuming the username is the email
    password: state.password
  };

  // Send a POST request to the login endpoint
  try {
    const response = await axios.post('/api/auth/login', credentials);
    const token = response.data.access_token;
    const user = response.data.user; // Extract the user data from the response
    const templateStore = useTemplateStore();
    templateStore.setToken(token);  // Store the token in the Pinia store
    templateStore.setUser(user);    // Store the user data in the Pinia store

    console.log("Login successful, token:", token);
    console.log("User data:", user);

    // Go to dashboard
    router.push({ name: "blank-block" });
  } catch (error) {
    console.error("Login failed:", error.response.data.error);
  }
}

// Function to handle Discord login
function loginWithDiscord() {
  // Placeholder for Discord OAuth2 logic
  window.location.href = '/login/discord';
  // You would typically redirect to Discord's OAuth2 URL here
}
</script>

<template>
  <!-- Page Content -->
  <div class="hero-static d-flex align-items-center">
    <div class="content">
      <div class="row justify-content-center push">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <!-- Sign In Block -->
          <BaseBlock title="Sign In" class="mb-0">
            <template #options>
              <RouterLink
                :to="{ name: 'auth-reminder' }"
                class="btn-block-option fs-sm"
                >Forgot Password?</RouterLink
              >
              <RouterLink
                :to="{ name: 'auth-signup' }"
                class="btn-block-option"
              >
                <i class="fa fa-user-plus"></i>
              </RouterLink>
            </template>

            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
              <h1 class="h2 mb-1">Stacked</h1>
              <p class="fw-medium text-muted">Welcome, please login.</p>

              <!-- Sign In Form -->
              <form @submit.prevent="onSubmit">
                <div class="py-3">
                  <div class="mb-4">
                    <input
                      type="text"
                      class="form-control form-control-alt form-control-lg"
                      id="login-username"
                      name="login-username"
                      placeholder="Username"
                      :class="{
                        'is-invalid': v$.username.$errors.length,
                      }"
                      v-model="state.username"
                      @blur="v$.username.$touch"
                    />
                    <div
                      v-if="v$.username.$errors.length"
                      class="invalid-feedback animated fadeIn"
                    >
                      Please enter your username
                    </div>
                  </div>
                  <div class="mb-4">
                    <input
                      type="password"
                      class="form-control form-control-alt form-control-lg"
                      id="login-password"
                      name="login-password"
                      placeholder="Password"
                      :class="{
                        'is-invalid': v$.password.$errors.length,
                      }"
                      v-model="state.password"
                      @blur="v$.password.$touch"
                    />
                    <div
                      v-if="v$.password.$errors.length"
                      class="invalid-feedback animated fadeIn"
                    >
                      Please enter your password
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="login-remember"
                        name="login-remember"
                      />
                      <label class="form-check-label" for="login-remember"
                        >Remember Me</label
                      >
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6 col-xl-5">
                    <button type="submit" class="btn w-100 btn-alt-primary">
                      <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i>
                      Sign In
                    </button>
                  </div>
                
                </div>
              </form>
              <p>or</p>
                    <button @click="loginWithDiscord" class="btn w-100 btn-alt-info">
                      <i class="fab fa-discord me-1"></i> Login with Discord
                    </button>
              <!-- END Sign In Form -->
            </div>
          </BaseBlock>
          <!-- END Sign In Block -->
        </div>
      </div>
      <div class="fs-sm text-muted text-center">
        <strong>{{ store.app.name + " " + store.app.version }}</strong> &copy;
        {{ store.app.copyright }}
      </div>
    </div>
  </div>
  <!-- END Page Content -->
</template>
