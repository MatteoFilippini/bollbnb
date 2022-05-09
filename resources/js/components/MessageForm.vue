<template>
  <div class="container">
      <div class="form-group mt-3 mb-1 form-mes d-flex justify-content-center">
        <div class="col-5 fs-3 contact">
          CONTATTA L'HOST
        </div>
        <div class="col-5">
          <!-- NAME -->
          <div>
        <input
          class="form-control"
          type="text"
          id="exampleName"
          v-model="form.name"
          :class="{ 'is-invalid': errors.name }"
        />
        <!-- mes errore FUTURO COMPONENTE-->
        <div v-if="errors.name" class="invalid-feedback err">
          {{ errors.name }}
        </div>
        <small v-else class="form-text "
          >Inserisci il tuo nome e cognome</small
        >    
          </div>
        <!-- EMAIL -->
        <div>
        <input
          type="text"
          class="form-control"
          id="exampleFormControlInput1"
          v-model="form.email"
          :class="{ 'is-invalid': errors.email }"
        />
        <div v-if="errors.email" class="invalid-feedback err">
          {{ errors.email }}
        </div>
        <small v-else class="form-text "
          >Inserisci la tua email e sarai ricontattato</small
        >
        </div>   
      <!-- DESCRIPTION- CONTENT -->
      <div class="form-group">
        <textarea
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="3"
          v-model="form.content"
          :class="{ 'is-invalid': errors.content }"
        ></textarea>
        <div v-if="errors.content" class="invalid-feedback err">
          {{ errors.content }}
        </div>
        <small v-else class="form-text "
          >Chiedi i tuoi dubbi all'host</small
        >
      </div>

  <div class="d-flex justify-content-end align-items-center">

    <router-link :to="{ name: 'detail' }" class="actions mr-4"
      >Indietro</router-link
    >
    <div class="actions a" @click="sendMessage">Invia</div>
  </div>
        </div>    
    </div>
  </div>
</template>

<script>
export default {
  name: "MessageForm",
  props: ["flat"],
  data() {
    return {
      form: {
        content: "",
        email: "",
        name: "",
        id: 0,
      },
      errors: {},
    };
  },
  computed: {
    hasErrors() {
      return Object.keys(this.errors).length;
    },
  },
  methods: {
    showAlert() {
      this.$swal("Messaggio mandato");
    },
    getId() {
      this.form.id = this.$route.params.id;
    },
    checkForm() {
      const errors = {};
      if (!this.form.name.trim()) errors.name = "Il nome è obbligatorio";
      if (!this.form.content.trim())
        errors.content = "Il contenuto del messaggio è obbligatorio";
      if (!this.form.email.match(/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/))
        errors.email = "La mail non è valida";

      this.errors = errors;
    },
    sendMessage() {
      // validazione FRONT-END
      
      this.checkForm();
      if (!this.hasErrors) {
        axios
          .post(
            "http://localhost:8000/api/send/" + this.$route.params.id,
            this.form
          )
          .then((res) => {
            // se ho l array errors in data
            if (res.data.errors) {
              // prendo le chiavi email,name,content dall array
              const { email, content, name } = res.data.errors;
              const errors = {};
              if (email) errors.email = email[0];
              if (content) errors.content = content[0];
              if (name) errors.name = name[0];
              this.errors = errors;
            } else {
              this.showAlert();
              this.form.email = "";
              this.form.content = "";
              this.form.name = "";
            }
            console.log("si");
          })
          .catch((err) => {
            console.log(err.response.status);
            this.errors = { error: "Si è verificato un errore" };
          });
      }
    },
  },
  mounted() {
    this.getId();
  },
};
</script>

<style lang="scss" scoped>
.form-mes{
  position:relative;
  top:80px;
  border:1px solid white;
  background-color:rgba(42,42,42);
  padding:40px 0;
  border-radius:20px;
  .contact{
    font-size:40px;
    color: #FF385C;
    font-weight: 600;
  }
  small{
    color: white;
    margin-bottom: 30px;
    font-size: 1.1rem;
  }
  .err{
    margin-bottom: 30px;
        font-size: 1rem;

  }
  .actions{
    color: #FF385C;
    font-weight: 400;
    font-size: 20px;
    text-decoration: none;
    cursor: pointer;
    text-transform: uppercase;
  }
}
</style>