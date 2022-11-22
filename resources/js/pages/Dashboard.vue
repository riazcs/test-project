<template>
  <div>
    Welcome {{ name }}
    <div class="row justify-content-center">
      <div class="col-4">
        <!-- <div class="card">
                    <div class="card-header">Upload Image</div>
                     <img :src="pic_path" height="300"/>
                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data" style="margin-bottom:200px; margin-top:100px;">
                            <input type="file" class="form-control" v-on:change="onChange"><br><br>
                            <button class="btn btn-primary btn-block">Upload</button>
                        </form>
                    </div>
                </div> -->
        <label for="cars" class="label">Present Class:</label>

        <select
          name="cars"
          id="cars"
          v-model="present_class"
          class="form-control"
        >
          <option value="">--select--</option>
          <option value="6">Class 6</option>
          <option value="7">Class 7</option>
          <option value="8">Class 8</option>
          <option value="8">Class 8</option>
        </select>
        <label for="cars" class="label mt-4">Present Year:</label>
        <select
          name="cars"
          id="cars"
          v-model="present_year"
          class="form-control"
        >
          <option value="">--select--</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>
      </div>
      <div class="col-4">
        <label for="cars" class="label">Improvement Class:</label>
        <select
          name="cars"
          id="cars"
          v-model="improve_class"
          class="form-control"
        >
          <option value="">--select--</option>
          <option value="6">Class 6</option>
          <option value="7">Class 7</option>
          <option value="8">Class 8</option>
          <option value="8">Class 8</option>
        </select>
        <label for="cars" class="label mt-4">Improvement Year:</label>
        <select
          name="cars"
          id="cars"
          v-model="improve_year"
          class="form-control"
        >
          <option value="">--select--</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
        </select>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-4"></div>
      <div class="col-4"></div>
      <div class="col-2 float-right">
        <button class="btn btn-sm btn-primary" @click="improveStudent">
          Submit
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      name: "",
      file: "",
      success: "",
      present_class: "",
      improve_class: "",
      improve_year: "",
      present_year: "",
    };
  },

  methods: {
    onChange(e) {
      this.file = e.target.files[0];
    },
    formSubmit(e) {
      e.preventDefault();
      let existingObj = this;
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      let data = new FormData();
      data.append("file", this.file);
      axios
        .post("/api/upload", data, config)
        .then(function (res) {
          existingObj.success = res.data.success;
        })
        .catch(function (err) {
          existingObj.output = err;
        });
    },

    improveStudent() {
      axios.post("/api/student-improvements", {
          present_class: this.present_class,
          improve_class: this.improve_class,
          present_year: this.present_year,
          improve_year: this.improve_year,
          
        })
        .then(function (res) {
          existingObj.success = res.data.success;
        })
        .catch(function (err) {
          existingObj.output = err;
        });
    },
  },
  created() {
    if (window.Laravel.user) {
      this.name = window.Laravel.user.name;
      this.pic_path = window.Laravel.user.pic_path;
    }
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    next();
  },
};
</script>
