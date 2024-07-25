<script setup lang="ts">
import {Pokemon} from "~/src/entities/Pokemon";

const page = ref(1);
const pokemons = ref({})

pokemons.value = await Pokemon.list(page.value);

watch(page, async (newPage) => {
  pokemons.value = await Pokemon.list(newPage)
})

</script>

<template>
  <div>
    <v-table>
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Types</th>
      </tr>
      </thead>
      <tbody v-if="pokemons && pokemons.data && pokemons.data.length">
      <tr v-for="pokemon in pokemons.data">
        <th>{{ pokemon.id }}</th>
        <th>{{ pokemon.name }}</th>
        <th>{{ pokemon.height }}</th>
        <th>{{ pokemon.weight }}</th>
        <th>{{ pokemon.types }}</th>
      </tr>
      </tbody>
    </v-table>
    <div class="text-center">
      <v-pagination
          v-model="page"
          :length="4"
          rounded="circle"
      ></v-pagination>
    </div>
  </div>
</template>

<style scoped>

</style>