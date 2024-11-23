<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
   <div>
    <!-- Menú de Navegación -->
    <nav class="menu">
      <ul>
        <li><a href="#home">Inicio</a></li>
        <li><a href="#about">Acerca de</a></li>
        <li><a href="#contact">Contacto</a></li>
      </ul>
    </nav>

    <!-- Selector de Tema y Opciones de Accesibilidad -->
    <div class="settings">
      <label for="tema">Seleccionar tema:</label>
      <select v-model="temaSeleccionado" @change="cambiarTema">
        <option value="ninos">Niños</option>
        <option value="jovenes">Jóvenes</option>
        <option value="adultos">Adultos</option>
      </select>

      <button @click="alternarModo">Modo Día/Noche</button>
      <button @click="aumentarFuente">Aumentar Fuente</button>
      <button @click="reducirFuente">Reducir Fuente</button>
      <button @click="alternarContraste">Alto Contraste</button>
    </div>

    <!-- Formulario de Prueba -->
    <div class="content">
      <h1>Formulario de Prueba</h1>
      <form>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" />

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Escribe tu correo" />

        <button type="submit">Enviar</button>
      </form>
    </div>
  </div>

</template>


<script>
export default {
  data() {
    return {
      temaSeleccionado: 'ninos', // Tema por defecto
    };
  },
  methods: {
    cambiarTema() {
      // Cambiar el tema según la selección
      document.body.className = this.temaSeleccionado;
      localStorage.setItem('tema', this.temaSeleccionado);
    },
    alternarModo() {
      // Alternar entre modo día y noche
      const esDia = document.body.classList.contains('dia');
      document.body.className = esDia ? 'noche' : 'dia';
    },
    aumentarFuente() {
      // Incrementar el tamaño de fuente
      const body = document.body;
      const estiloActual = window.getComputedStyle(body).fontSize;
      let nuevoTamano = parseFloat(estiloActual) + 2;
      body.style.fontSize = `${nuevoTamano}px`;
    },
    reducirFuente() {
      // Reducir el tamaño de fuente
      const body = document.body;
      const estiloActual = window.getComputedStyle(body).fontSize;
      let nuevoTamano = parseFloat(estiloActual) - 2;
      body.style.fontSize = `${nuevoTamano}px`;
    },
    alternarContraste() {
      // Activar o desactivar el alto contraste
      document.body.classList.toggle('alto-contraste');
    },
  },
  mounted() {
    // Cargar tema guardado del Local Storage
    const temaGuardado = localStorage.getItem('tema') || 'ninos';
    this.temaSeleccionado = temaGuardado;
    document.body.className = temaGuardado;
  },
};
</script>

<style>
/* Estilos Generales */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.menu {
  background-color: #333;
  color: white;
  padding: 10px;
}

.menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.menu ul li {
  margin-right: 15px;
}

.menu ul li a {
  color: white;
  text-decoration: none;
}

.settings {
  margin: 20px;
}

.content {
  padding: 20px;
}

/* Estilos por Tema */
body.ninos {
  background-color: yellow;
  color: blue;
}

body.jovenes {
  background-color: lightgray;
  color: green;
}

body.adultos {
  background-color: white;
  color: black;
}

/* Modo Día y Noche */
body.dia {
  background-color: white;
  color: black;
}

body.noche {
  background-color: black;
  color: white;
}

/* Alto Contraste */
body.alto-contraste {
  background-color: black;
  color: yellow;
}

form label {
  display: block;
  margin-bottom: 10px;
}

form input,
form button {
  display: block;
  margin-bottom: 20px;
}

form input {
  padding: 10px;
  width: 100%;
}

form button {
  padding: 10px 20px;
  background-color: blue;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
