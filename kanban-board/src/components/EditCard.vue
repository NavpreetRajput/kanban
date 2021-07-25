<template>
    <div>
        <h2>Edit Card</h2>
        <input v-model="cardTitle" placeholder="Enter Card Title"/>
        <p>Card Description</p>
        <textarea v-model="cardDescription" placeholder="Enter Card Title"/>
        <button class="btn btn-secondary" v-on:click="closeModal()">Save Card</button>
    </div>
</template>

<script>
import { eventBus } from '../main'

export default {
  name: "EditModal",
  props: {
    columnId: {
      type: Number,
    },
    cardId: {
      type: Number,
    },
    cardTitle: {
      type: String,
    },
    cardDescription: {
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
      eventBus.$emit('cardSavedFromModal',{'columnId': this.columnId, 'cardId':this.cardId, 'cardTitle': this.cardTitle, 'cardDescription': this.cardDescription});
      this.$emit('close');
    },
    openModal() {
    }
  }
};
</script>


<style>

</style>