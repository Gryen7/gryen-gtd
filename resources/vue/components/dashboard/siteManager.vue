<template>
  <div>
    <div class="d-flex justify-content-between mb-3">
      <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary" @click="addConfig()">添加配置</button>
      </div>
    </div>
    <ul v-if="!showAddConfig" class="list-group">
      <li class="list-group-item disabled">
        <div class="row">
          <div class="col-sm-2">配置组</div>
          <div class="col-sm-2">配置组名称</div>
          <div class="col-sm-2">配置项</div>
          <div class="col-sm-3">配置项名称</div>
          <div class="col-sm-3">配置项值</div>
        </div>
      </li>
      <li v-for="config in configManies" :key="config.id" class="list-group-item">
        <div class="row">
          <div class="col-sm-2">{{config.group}}</div>
          <div class="col-sm-2">{{config.group_name}}</div>
          <div class="col-sm-2">{{config.config}}</div>
          <div class="col-sm-3">{{config.config_name}}</div>
          <div class="col-sm-3">{{config.config_value}}</div>
        </div>
      </li>
    </ul>
    <div v-else>
      <form>
        <div class="form-row">
          <div class="form-group col">
            <label for="group">配置组：</label>
            <input type="text" class="form-control" id="group" />
          </div>
          <div class="form-group col">
            <label for="groupName">配置组名称：</label>
            <input type="text" class="form-control" id="groupName" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="config">配置项：</label>
            <input type="text" class="form-control" id="config" />
          </div>
          <div class="form-group col">
            <label for="configName">配置项名称：</label>
            <input type="text" class="form-control" id="configName" />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="configValue">配置项值：</label>
            <textarea type="text" class="form-control" id="configValue" rows="3" />
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <button type="submit" class="btn btn-primary">添加</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<style lang="scss" scoped>
</style>
<script>
export default {
  data: function() {
    return {
      showAddConfig: false,
      configManies: []
    };
  },
  created: async function() {
    this.renderConfigManies();
  },
  methods: {
    renderConfigManies: async function() {
      const res = await axios.get('/api/dashboard/configmanies');

      this.configManies = res.data;
    },
    addConfig: function() {
      this.showAddConfig = true;
    }
  }
};
</script>
