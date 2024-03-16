<template>
  <q-card
    class="row q-col-gutter-md items-center justify-evenly"
    style="height: calc(100vh - 50px)"
  >
    <div class="col-12 col-sm-6 col-md-4">
      <q-card-section>
        <div class="text-center q-pt-md">
          <div class="col text-h4" v-if="!bad_auth">Login</div>
          <div class="col text-h6 ellipsis" v-if="bad_auth">Erro no login</div>
        </div>
      </q-card-section>
      <q-card-section>
        <q-form class="q-gutter-md" @submit="onSubmit">
          <q-input
            ref="emailRef"
            :rules="requiredRules"
            v-model="form.email"
            dense
            outlined
            lazy-rules
            label="E-mail *"
          />

          <q-input
            ref="passwordRef"
            :rules="requiredRules"
            v-model="form.password"
            dense
            outlined
            lazy-rules
            label="Senha *"
          />

          <q-card-actions class="q-pa-none">
            <q-btn
              @click="onSubmit"
              no-caps
              class="full-width"
              color="primary"
              label="Entrar"
              size="lg"
              unelevated
            />
          </q-card-actions>
        </q-form>
      </q-card-section>
    </div>
  </q-card>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';
import { authStore } from 'src/stores/auth';
import { useQuasar } from 'quasar';

const auth = authStore();
const router = useRouter();
const $q = useQuasar();

const bad_auth = ref(false);
const emailRef = ref(null);
const passwordRef = ref(null);

const requiredRules = [(val: any) => !!val || 'Campo é obrigatório'];

const form = reactive({ email: '', password: '', device_name: getDeviceId() });

async function onSubmit() {
  if (validateForm()) {
    const data = await auth.login(form);
    console.log(data);
    if (data.token) {
      await router.push('/');
    } else {
      bad_auth.value = true;
    }
  }
}

function validateForm() {
  emailRef?.value?.validate();
  passwordRef?.value?.validate();

  if (emailRef?.value?.hasError || passwordRef?.value?.hasError) {
    $q.notify({
      color: 'negative',
      message: 'Preencha os campos obrigatórios',
    });
    return false;
  }

  return true;
}

function generateUniqueDeviceId() {
  return Date.now().toString(36) + Math.random().toString(36).substr(2);
}

function getDeviceId() {
  let deviceId = localStorage.getItem('deviceId');
  if (!deviceId) {
    // Se não houver um ID armazenado localmente, verifique o armazenamento de sessão
    deviceId = sessionStorage.getItem('deviceId');
    if (!deviceId) {
      // Se não houver um ID no armazenamento de sessão, gere um novo ID e armazene-o em ambos os locais
      deviceId = generateUniqueDeviceId();
      localStorage.setItem('deviceId', deviceId);
      sessionStorage.setItem('deviceId', deviceId);
    } else {
      // Se houver um ID no armazenamento de sessão, armazene-o no armazenamento local
      localStorage.setItem('deviceId', deviceId);
    }
  }
  return String(deviceId);
}
</script>
