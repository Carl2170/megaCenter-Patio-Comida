<template>

 
  <div>
    <SideBar
        :sidebarLinks="sidebarLinks"
        :headerLinks="headerLinks"
        userName="Juan Perez"
        userAvatar="https://res.cloudinary.com/dnkvrqfus/image/upload/v1700017356/user_zmcosz.jpg">
      
       <div class="content">
         <h1>Bienvenido Locatario</h1>
        </div> 

       
    </SideBar>
      
  </div>
</template>

<script>
import SideBar from '@/Layouts/Sidebar.vue';

export default {
  components: { SideBar },
  data() {
    return {
      sidebarLinks: [
        { name: 'Dashboard', href: '/dashboard' },
        { name: 'Clientes', href: '/clientes' },
        { name: 'Configuraciones', href: '/configuraciones' },
      ],
      headerLinks: [
        { name: 'Perfil', href: '/perfil' },
        { name: 'Logout', href: '/logout' },
      ],
    };
  },
};
</script>
