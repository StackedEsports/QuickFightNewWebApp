<script setup></script>

<template>
  <!-- Hero -->
  <BasePageHeading
    title="Role Selection"
    subtitle="Choose your role to get started!"
  >
    <template #extra>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item">
            <a class="link-fx" href="javascript:void(0)">Home</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">Role Selection</li>
        </ol>
      </nav>
    </template>
  </BasePageHeading>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content d-flex flex-column flex-md-row justify-content-evenly">
    <BaseBlock title="Tournament Organizer" class="col-12 col-md-5">
      <template #options>
        <button type="button" class="btn-block-option">
          <i class="si si-settings"></i>
        </button>
      </template>
      <p>Manage tournaments, set schedules, and invite players.</p>
    </BaseBlock>
    <BaseBlock title="Player" class="col-12 col-md-5">
      <template #options>
        <router-link :to="{ name: 'backend-dashboard' }">
          <button type="button" class="btn-block-option">
            <i class="si si-game-controller"></i>
          </button>
        </router-link>
      </template>
      <p>Join tournaments, view your upcoming games, and check results.</p>
    </BaseBlock>
  </div>
  <!-- END Page Content -->
</template>
