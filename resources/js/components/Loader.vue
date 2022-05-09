<template>

  <div class="d-flex justify-content-center align-items-center load">
    <div class="spinner-border" style="width: 5rem; height: 5rem" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader",
};
</script>

<style scoped lang="scss">
.loader{
  position: fixed;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-color: black
  }
</style>