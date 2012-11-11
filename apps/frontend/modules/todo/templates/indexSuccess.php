<script src="/lib/angular/angular.js"></script>  
<script src="/js/todo/controller.js"></script>  
<style>
  .done-true {
    text-decoration: line-through;
    color: gray;
  }
</style>
<div ng-app>
  <h1>TODO List</h1>
  <div ng-controller="TodoCtrl">
      <div>Completed: {{ getCompleted() }} of {{ todoList.length }}</div>
      <div>
        Filter: <input type="text" ng-model="search" placeholder="Enter something to filter on"><button ng-click="clearDone()">Clear Done</button>
      </div>
      <div id="itemsListContainer">
        <div ng-repeat="item in todoList | filter: search">
          <input type="checkbox" ng-model="item.done"> <span class="done-{{item.done}}">{{ item.text }}</span>
        </div>
      </div>
      <form>
        <input type="text" ng-model="Todo.text" placeholder="Type something to add"><button ng-click="addToList()">Add</button>
      </form>
  </div>
</div>