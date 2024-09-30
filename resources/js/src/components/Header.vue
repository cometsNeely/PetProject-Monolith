<template>
    <header class="header">
          <ul class="header__menu nav nav-pills">
              <li class="nav-item">
                  <router-link
                      aria-current="page"
                      class="nav-link"
                      to="/"
                      >Главная
                  </router-link>
              </li>
              <li class="nav-item">
                  <router-link
                      class="nav-link"
                      to="/thriller"
                      >Триллеры
                  </router-link>
              </li>
              <li class="nav-item">
                  <router-link
                      class="nav-link"
                      to="/drama"
                      >Драмы
                  </router-link>
              </li>
          </ul>
      </header>
  </template>

<script>
</script>

<style scoped>
.header {
    width: 992px;
    margin: 0 auto;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>