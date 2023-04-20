<template>
    <div>
      <h1>{{ $page.title }}</h1>
      <p>Bem-vindo(a), {{ user.name }}!</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      user: Object,
    },
  };
  </script>
  