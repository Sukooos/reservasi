<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <div>
      <h1 class="text-2xl font-bold mb-6">Dashboard Reservasi Online</h1>
  
      <!-- Statistics Cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-500 text-white p-6 rounded-md">
          <h4>Total Reservations</h4>
          <h2 class="text-3xl font-bold">{{ totalReservations }}</h2>
        </div>
        <div class="bg-green-500 text-white p-6 rounded-md">
          <h4>Active Reservations</h4>
          <h2 class="text-3xl font-bold">{{ activeReservations }}</h2>
        </div>
        <div class="bg-yellow-500 text-white p-6 rounded-md">
          <h4>Pending Reservations</h4>
          <h2 class="text-3xl font-bold">{{ pendingReservations }}</h2>
        </div>
        <div class="bg-red-500 text-white p-6 rounded-md">
          <h4>Canceled Reservations</h4>
          <h2 class="text-3xl font-bold">{{ canceledReservations }}</h2>
        </div>
      </div>
  
      <!-- Recent Reservations Table -->
      <h2 class="text-xl font-semibold mb-4">Recent Reservations</h2>
      <table class="min-w-full bg-white border border-gray-200">
        <thead>
          <tr>
            <th class="border px-4 py-2">Reservation ID</th>
            <th class="border px-4 py-2">Customer</th>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id">
            <td class="border px-4 py-2">{{ reservation.id }}</td>
            <td class="border px-4 py-2">{{ reservation.customer_name }}</td>
            <td class="border px-4 py-2">{{ reservation.created_at }}</td>
            <td class="border px-4 py-2">
              <span :class="statusClass(reservation.status)">
                {{ reservation.status }}
              </span>
            </td>
            <td class="border px-4 py-2">
              <button class="bg-blue-500 text-white px-4 py-2 rounded-md">View</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

<script>
export default {
  props: {
    reservations: Array,
    totalReservations: Number,
    activeReservations: Number,
    pendingReservations: Number,
    canceledReservations: Number,
  },
  methods: {
    statusClass(status) {
      switch (status) {
        case 'confirmed':
          return 'text-green-500';
        case 'pending':
          return 'text-yellow-500';
        case 'canceled':
          return 'text-red-500';
        default:
          return '';
      }
    }
  }
}
</script>

<style scoped>
/* Tambahkan styling khusus di sini jika diperlukan */
</style>
