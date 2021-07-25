<template>
    <div>
        <h2>Edit Column Title</h2>
        <input v-model="name" placeholder="Enter New Title"/>
        <button class="btn btn-secondary" v-on:click="closeModal()">Save Column Title</button>
    </div>
</template>

<script>
import { eventBus } from '../main'

export default {
  name: "EditColumnTitle",
  props: {
    columnId: {
      type: Number,
    },
    name: {
      type: String,
    }
  },
  data() {
    return {
      show: true,
      
    };
  },
  methods: {
    closeModal() {
      eventBus.$emit('columnTitleSavedFromModal',{'columnId': this.columnId, 'name':this.name});
      this.$emit('close');
    },
    openModal() {
    }
  }
};
</script>


<style>

</style>