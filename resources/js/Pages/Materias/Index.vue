<template>

<Head title="Materias" />

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Materias</h2>

    <div class="py-12">
        <div class="bg-white grid v-sscreen place-items-center">
            <div class="mt-3 mb-3 flex">
                <Link
                    :href="route('materias.index')"
                    :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'"
                >
                    <i class="fa-solid fa-plus-circle"></i> Agregar
                </Link>
            </div>
        </div>
        <div class="bg-white grid v-sscreen place-items-center">
            <table class="table-auto border border-gray-400">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-4">#</th>
                        <th class="px-4 py-4">Nombre</th>
                        <th class="px-4 py-4">Descripción</th>
                        <th class="px-4 py-4">Crédito</th>
                        <th class="px-4 py-4">Horas</th>
                        <th class="px-4 py-4">Crédito</th>
                        <th class="px-4 py-4">Área de conocimiento</th>
                        <th class="px-4 py-4">Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="data.cargando">
                        <td
                            class="border border-gray-400 px-4 py-4"
                            colspan="10"
                        >
                            <span class="font-semibold text-2xl"
                                >Cargando...</span
                            >
                        </td>
                    </tr>
                    <tr v-else v-for="(materia, i) in data.materias.slice(0, 10)" :key="materia.id">
                        <td v-text="i + 1"></td>
                        <td v-text="materia.nombre"></td>
                        <td v-text="materia.descripcion"></td>
                        <td v-text="materia.credito"></td>
                        <td v-text="materia.horas"></td>
                        <td v-text="materia.areaConocimiento"></td>
                        <td v-text="materia.created_at"></td>
                        <td></td>
                        <tr v-if="!data.cargando && !data.materias.length">
                        <td class="border border-gray-400 px-4 py-4" colspan="10">
                            <span class="font-semibold text-2xl">No hay materias registradas</span>
                        </td>
                        </tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  
</template>

<script setup>

import { inertia } from '@inertiajs/inertia-vue';
import axios from "axios";
import { ref } from "vue";
import { onMounted } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const data = ref({
    materias: [],
    cargando: false,
});



const getMaterias = async () => {
  data.value.cargando = true;
  try {
    const response = await axios.get("http://projectacademia.test/api/v1/materias", {
      params: {
        limit: 10,
      },
    });
    data.value.materias = response.data;
  } catch (error) {
    console.error("Error al obtener materias:", error);
    // Maneja el error, por ejemplo, mostrando un mensaje al usuario
  } finally {
    data.value.cargando = false;
  }
};

onMounted(getMaterias);
</script>
