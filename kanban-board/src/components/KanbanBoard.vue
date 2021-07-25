<template>
  
  <div class="row">

  <div style="margin-top: 20px;margin-bottom: 20px">
    <button class="btn btn-secondary" @click="addNewColumn()">Add New Column</button>
    <button class="btn btn-secondary" @click="loadFromDatabase()">Load From Database</button>
  </div>
  <div>
  </div>
    <div class="col-2"
          v-for="column in allColumns"
          :allColumns="allColumns"
          :key="column.name">
       <div class="list-group-item item">
      <h4 style="cursor: pointer" @click="columTitleClicked(column.id, column.name)">{{ column.name }}</h4>

            <draggable
              id="first"
              class="list-group"
              draggable=".item"
              group="a"
              :list="column.cards"
              
            >
              <div
                class="list-group-item item"
                v-for="card in column.cards"
                :key="card.title"
                @click="cardClicked(column.id, card.id, card.title, card.description)"
              >
                {{ card.title }}
              </div>

              <div
                slot="header"
                class="btn-group "
                role="group"
                aria-label="Basic example"
              >
                <button class="btn btn-secondary" @click="addCard(column.name)">Add Card</button>
                <button class="btn btn-danger" @click="deleteColumn(column.name)">Delete Column</button>
              </div>
            </draggable>
        </div>
      </div>
  <div style="margin-top: 20px;margin-bottom: 20px">
    <button class="btn btn-secondary" @click="saveToDatabase()">Save To Database</button>
  </div>
  </div>
</template>

<script>

import draggable from 'vuedraggable'
import EditCard from "./EditCard";
import EditColumnTitle from "./EditColumnTitle";
import { eventBus } from '../main';


const axios = require('axios');
export default {
  title: "two-list-headerslots",
  display: "Two list header slot",
  order: 14,
  components: {
    draggable
  },

  
  
  data() {
    return {
      id: 1,
      newColumnId: 1,
      allColumns: [

      ]
    };
  },
    async mounted() {
    eventBus.$on('cardSavedFromModal', (data) => {this.onCardSaved(data)});
    eventBus.$on('columnTitleSavedFromModal', (data) => {this.onColumnNameUpdated(data)});
    await this.loadFromDatabase()
    this.initIds()
  },  
  methods: {
    initIds: function() {
      for (var columnIndex in this.allColumns){
        var column = this.allColumns[columnIndex]
        if (this.newColumnId <= column.id){
            this.newColumnId = column.id + 1
        }
        
          for (var cardIndex in column.cards){
            var card = column.cards[cardIndex]
            if (this.id <= card.id){
              this.id = card.id + 1
            }
          }
        
      }
      
    },

    onColumnNameUpdated: function(data) {
      this.$modal.hide('editCardModal')
      for (var columnIndex in this.allColumns){
        var column = this.allColumns[columnIndex]
        if (column.id == data.columnId) {
          console.log('column.id =====' + column.id)
          column.name = data.name
        }
      }
      
    },
    columTitleClicked: function(columnId, name) {
      this.$modal.show(
        EditColumnTitle,
        {'columnId': columnId, 'name':name},
        { draggable: true }
      )
    },
    cardClicked: function(columnId, cardId, cardTitle, cardDescription) {
      this.$modal.show(
        EditCard,
        {'columnId': columnId, 'cardId':cardId, 'cardTitle':cardTitle, 'cardDescription':cardDescription},
        { draggable: true }
      )
    },
    onCardSaved: function(data) {
      this.$modal.hide('editCardModal')
      for (var columnIndex in this.allColumns){
        var column = this.allColumns[columnIndex]
        if (column.id == data.columnId) {
          for (var cardIndex in column.cards){
            var card = column.cards[cardIndex]
            if (card.id == data.cardId) {
              card.title = data.cardTitle
              card.description = data.cardDescription
            }
          }
        }
      }
    },
    addCard: function(columnName) {
      for (var columnIndex in this.allColumns){
        var column = this.allColumns[columnIndex]
        if (column.name == columnName) {
          column.cards.push({ title: "New Card " + this.id, description: 'description ' + this.id, id: this.id++ })
        }
      }
      
    },
    deleteColumn: function(columnName) {
      for (var columnIndex in this.allColumns){
        var column = this.allColumns[columnIndex]
        if (column.name == columnName) {
          break
        }
      }
      this.allColumns.splice(columnIndex, 1)
    },
    addNewColumn: function() {
      this.allColumns.push({name: "New Column " + this.newColumnId, id:this.newColumnId++, cards: [] })
    },
    loadFromDatabase:function() {

      this.allColumns.splice(0, this.allColumns.length);
      var allColumns=this.allColumns
      return axios.get('http://13.238.185.0:80/columns')
        .then(function (response) {
          const columnsFromDatabase = JSON.parse(response.data[0].json)
          for (var columnFromDatabaseIndex in columnsFromDatabase){
            allColumns.push(columnsFromDatabase[columnFromDatabaseIndex])
          }

        })
        .catch(function (error) {
          console.log(error);
        })
    },
    saveToDatabase: function() {
        const headers2 = {
          'Content-Type': 'application/json'          
        }

        axios.put('http://13.238.185.0:80/columns/1', {json: this.allColumns}, {
            headers: headers2
          })
          .then(() => {
            console.log('1')
          })
          .catch(() => {
            console.log('2')
          })
      }

    }
  }



</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>


