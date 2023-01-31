<script>
import axios from "axios";
import { basicUrl } from "../data/data";
import { ApiService } from "../services/api.service";
export default {
    name: "Contacts",
    data() {
        return {
        name: "",
        object: "",
        email: "",
        message: "",
        errors: {},

        basicUrl,
        loading: false,
        formSent: false,
        };
    },
    methods: {
        sendForm() {
        this.loading = true;
        const data = {
            name: this.name,
            object: this.object,
            email: this.email,
            message: this.message,
        };
        axios.post(`${basicUrl}contacts`, data).then((res) => {
            if (!res.data.success) {
                this.errors = res.data.errors;
                console.log(this.errors);
            } else {
                this.name = "";
                this.object = "";
                this.email = "";
                this.message = "";
                this.errors = {};
                this.formSent = true;
            }
            this.loading = false;

        });
        },
    },
};
</script>

<template>
  <h1>Contacts</h1>

  <form v-if="!formSent" class="w-75" action="" @submit.prevent="sendForm()">
    <div>
      <input
        class="form-control"
        :class="{ 'is-invalid': errors.name }"
        v-model.trim="name"
        type="text"
        placeholder="name"
      />
      <p
        v-for="(error, index) in errors.name"
        :key="'name' + index"
        class="invalid-feedback"
      >
        {{ error }}
      </p>
    </div>
    <div>
      <input
        class="form-control"
        :class="{ 'is-invalid': errors.object }"
        v-model.trim="object"
        type="text"
        placeholder="object"
      />
      <p
        v-for="(error, index) in errors.object"
        :key="'obj' + index"
        class="invalid-feedback"
      >
        {{ error }}
      </p>
    </div>
    <div>
      <input
        class="form-control"
        :class="{ 'is-invalid': errors.email }"
        v-model.trim="email"
        type="text"
        placeholder="email"
      />
      <p
        v-for="(error, index) in errors.email"
        :key="'email' + index"
        class="invalid-feedback"
      >
        {{ error }}
      </p>
    </div>
    <div>
      <textarea
        class="form-control"
        :class="{ 'is-invalid': errors.message }"
        v-model.trim="message"
        name="message"
        placeholder="message"
        id=""
        cols="30"
        rows="10"
      ></textarea>
      <p
        v-for="(error, index) in errors.message"
        :key="'message' + index"
        class="invalid-feedback"
      >
        {{ error }}
      </p>
    </div>
    <button :disabled="loading" class="btn btn-primary" type="submit">
      {{ loading ? "Invio in corso..." : "Invia" }}
    </button>
  </form>

  <h2 v-else>L'email è stata mandata con successo!</h2>
</template>

<style>
</style>
