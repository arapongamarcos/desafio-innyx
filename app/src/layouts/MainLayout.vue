<template>
  <q-layout view="hHh lpR fFf" class="bg-grey-1">
    <q-header elevated class="bg-white text-grey-8 q-py-xs" height-hint="58">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          @click="toggleLeftDrawer"
          aria-label="Menu"
          icon="menu"
        />

        <q-img class="q-ml-md" style="max-width: 120px" :src="logo"></q-img>

        <q-space />

        <!-- <div class="YL__toolbar-input-container row no-wrap">
          <q-input
            dense
            outlined
            square
            v-model="search"
            placeholder="Search"
            class="bg-white col"
          />
          <q-btn
            class="YL__toolbar-input-btn"
            color="grey-3"
            text-color="grey-8"
            icon="search"
            unelevated
          />
        </div> -->

        <q-space />

        <div class="q-gutter-sm row items-center no-wrap">
          <q-btn dense flat no-wrap>
            <q-avatar rounded size="20px">
              <img src="https://cdn.quasar.dev/img/avatar3.jpg" />
            </q-avatar>
            <q-icon name="arrow_drop_down" size="16px" />

            <q-menu auto-close>
              <q-list dense>
                <q-item class="GL__menu-link-signed-in">
                  <q-item-section>
                    <div>Marcos Araponga</div>
                  </q-item-section>
                </q-item>

                <q-separator />

                <q-item clickable class="GL__menu-link">
                  <q-item-section>Sign out</q-item-section>
                </q-item>
              </q-list>
            </q-menu>
          </q-btn>
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      class="bg-grey-2"
      :width="240"
    >
      <q-scroll-area class="fit">
        <q-list padding>
          <q-item v-ripple clickable @click="openPage('')">
            <q-item-section avatar>
              <q-icon color="grey" :name="fasHouse" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Home</q-item-label>
            </q-item-section>
          </q-item>
          <q-item v-ripple clickable @click="openPage('categorias')">
            <q-item-section avatar>
              <q-icon color="grey" :name="fasList" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Categorias</q-item-label>
            </q-item-section>
          </q-item>
          <q-item v-ripple clickable @click="openPage('produtos')">
            <q-item-section avatar>
              <q-icon color="grey" :name="fasBoxOpen" />
            </q-item-section>
            <q-item-section>
              <q-item-label>Produtos</q-item-label>
            </q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { fasHouse, fasList, fasBoxOpen } from '@quasar/extras/fontawesome-v6';
import logo from 'assets/logo.png';
import { useRouter } from 'vue-router';
import { authStore } from 'src/stores/auth';

const leftDrawerOpen = ref(false);
const router = useRouter();

function openPage(page: string) {
  router.push(`/${page}`);
}
onMounted(() => {
  authStore().getUser();
});

function toggleLeftDrawer() {
  leftDrawerOpen.value = !leftDrawerOpen.value;
}
</script>
