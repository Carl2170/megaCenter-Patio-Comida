<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const logout = () => {
    router.post(route('logout'));
};
</script>
<template>
  <div class="layout">
    <!-- Sidebar -->
    <nav class="sidebar" :class="{ hidden: !isOpen }">
      <div class="logo-container">
        <img src="https://res.cloudinary.com/dnkvrqfus/image/upload/v1731172651/nevi4crc6tizxifyfxod.png" alt="Logo de la Empresa" class="company-logo" />
      </div>
      <h4 class="sidebar-title">MEGA CENTER</h4>
      <ul class="sidebar-menu">
        <li v-for="link in sidebarLinks" :key="link.name">
          <Link :href="link.href" @click="setTitle(link.name)">{{ link.name }}</Link>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <div class="main">
      <header class="header">
        <button @click="toggleSidebar" class="toggle-btn">
          {{ isOpen ? '☰' : '☰' }}
        </button>

        <div class="user-info">
          <div class="titulo">
            <h1>{{ currentTitle }}</h1>
          </div>

          <div>
            <img :src="userAvatar" alt="User Avatar" class="user-avatar" />

            <div class="ms-3 relative">
                                <Dropdown align="right" width="58">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="size-8 rounded-full object-cover" :src="'https://www.example.com/path/to/your/image.jpg'" alt="Profile Image">
                                          </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('profile.show')">
                                            Profile
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                            API Tokens
                                        </DropdownLink>

                                        <div class="border-t border-gray-200 dark:border-gray-600" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Log Out
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>

          </div>
        </div>
      </header>
      <main class="content">
        <slot>
        </slot>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    sidebarLinks: {
      type: Array,
      required: true,
    },
    headerLinks: {
      type: Array,
      required: true,
    },
    userName: {
      type: String,
      default: 'Usuario',
    },
    userAvatar: {
      type: String,
      default: 'https://res.cloudinary.com/dnkvrqfus/image/upload/v1700017356/user_zmcosz.jpg',
    },
  },
  data() {
    return {
      isOpen: true,
      currentTitle: 'Dashboard',
    };
  },
  methods: {
    toggleSidebar() {
      this.isOpen = !this.isOpen;
    },
    setTitle(title) {
      this.currentTitle = title;
    },
  },
};
</script>

<style scoped>
/* Layout general */
.layout {
  display: flex;
  height: 100vh;
  overflow: hidden;
  background-color: #f9f9f9; /* Fondo general claro */
}

/* Sidebar */
.sidebar {
  width: 250px;
  background-color: #ffffff; /* Fondo blanco elegante */
  color: #333333; /* Texto oscuro para buena legibilidad */
  transition: transform 0.3s ease; /* Animación de entrada/salida */
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Sombra sutil */
}

.sidebar.hidden {
  transform: translateX(-100%); /* Mueve el sidebar fuera de la pantalla */
}

.sidebar-title {
  text-align: center;
  padding: 20px;
  font-size: 18px;
  font-weight: bold;
  background-color: #f1f1f1; /* Fondo ligeramente gris */
  color: #4a4a4a; /* Texto más oscuro */
  margin: 0;
  text-transform: uppercase;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar-menu li {
  border-bottom: 1px solid #eaeaea; /* Divisiones claras */
}

.sidebar-menu li a {
  display: block;
  padding: 15px 20px;
  text-decoration: none;
  color: #4a4a4a; /* Texto gris elegante */
  transition: background 0.3s, color 0.3s;
}

.sidebar-menu li a:hover {
  background-color: #e3f2fd; /* Azul pastel claro */
  color: #007bff; /* Azul principal para hover */
}

/* Main Content */
.main {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  background-color: #ffffff; /* Fondo blanco */
}

/* Botón de alternar Sidebar */
.toggle-btn {
  position: fixed; /* Fijo en la pantalla */
  top: 10px;
  left: 10px;
  background: #007bff; /* Azul principal */
  color: #ffffff; /* Texto blanco */
  border: none;
  font-size: 14px;
  padding: 10px 15px;
  cursor: pointer;
  z-index: 1000; /* Por encima del contenido */
  border-radius: 5px;
  transition: background 0.3s, transform 0.2s;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

.toggle-btn:hover {
  background: #0056b3; /* Azul más oscuro en hover */
  transform: scale(1.05); /* Ligero zoom */
}

/* Contenido principal */
.content {
  background-color: #f9f9f9; /* Fondo claro para el contenido */
  color: #4a4a4a; /* Texto gris oscuro */
  overflow-y: auto;
  font-family: 'Arial', sans-serif;
  line-height: 1.6;
}

/* Texto general */
h1, h2, h3, h4, h5, h6 {
  color: #333333; /* Títulos oscuros */
}

p {
  color: #555555; /* Texto para párrafos */
}

/* Links en el contenido */
a {
  color: #007bff; /* Azul principal */
  text-decoration: none;
  transition: color 0.3s;
}

a:hover {
  color: #0056b3; /* Azul más oscuro */
}

.logo-container {
  text-align: center; /* Centra el logo */
  padding: 20px 0; /* Espaciado superior e inferior */
  background-color: #f8f9fa; /* Fondo suave para el logo */
}

.company-logo {
  width: 150px; /* Ajusta el ancho del logo */
  height: auto; /* Mantiene la proporción del logo */
  border-radius: 8px; /* Opcional: Esquinas redondeadas */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Opcional: Sombra ligera */
  display: block; /* Asegura que el logo se comporte como un bloque */
  margin: 0 auto; /* Centra el logo horizontalmente */
}

.user-info {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-left: auto; /* Esto empuja el contenedor a la derecha */
  justify-content: space-between; /* Alinea los elementos a los extremos */
  position: relative;
  width: 100%; /* Asegura que el contenedor ocupe todo el espacio disponible */
}
.user-info div {
  display: flex;
  flex-direction: row; /* Asegura que los elementos dentro del div estén en fila */
  align-items: center; /* Centra verticalmente los elementos */
}

.username {
  font-size: 16px;
  font-weight: bold;
  color: #333;
}
/* Header */
.header {
  background-color: #f8f9fa;
  padding: 15px;
  display: flex;
  align-items: center;
  justify-content: space-between; /* Alinea los elementos a los extremos */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

/* Aseguramos que el título esté alineado a la izquierda */
.user-info h1 {
  margin: 0;
  margin-left: 15px; /* Espacio entre el título y el avatar */
  text-align: left; /* Asegura que el título esté alineado a la izquierda */
  flex-shrink: 0; /* Evita que el título se encoja */
  white-space: nowrap; /* Asegura que el título no se envuelva */
  color: #333333; /* Texto oscuro para el título */
  transition: margin-left 0.3s ease; /* Suaviza el movimiento */
}



.user-avatar {
  width: 40px;
  height: 40px;
  margin-left: 15px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #007bff; /* Añade borde azul alrededor de la imagen */
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-btn {
  background: transparent;
  border: none;
  font-size: 18px;
  cursor: pointer;
  color: #333;
  padding: 5px 10px;
  transition: color 0.3s;
}

.dropdown-btn:hover {
  color: #007bff;
}
/* Ajusta el dropdown para alinearlo a la derecha */
.dropdown-content {
  display: none !important;
  position: absolute;
  right: 0; /* Alinea el contenido a la derecha */
  top: 100%; /* Coloca el dropdown justo debajo del botón */
  background-color: #ffffff;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  min-width: 160px; /* Ancho mínimo para el contenido */
  z-index: 1;
  border-radius: 5px;
  overflow: hidden;
}

/* Mostrar el dropdown al pasar el mouse */
.dropdown:hover .dropdown-content {
  display: block !important;
}

/* Estilo de los enlaces dentro del dropdown */
.dropdown-content a {
  color: #333;
  padding: 10px 20px;
  text-decoration: none;
  display: block;
  transition: background-color 0.3s;
}

.dropdown-content a:hover {
  background-color: #e3f2fd;
  color: #007bff;
}

.user-info .titulo  {
  display:block;
  font-size: 28px;
  font-weight: bold;
  margin-left: px;
}

.content {
  flex-grow: 1;
  padding: 20px;
  background-color: #fff;
}
</style>
