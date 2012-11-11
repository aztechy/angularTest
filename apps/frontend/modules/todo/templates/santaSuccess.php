<script src="/lib/angular/angular.js"></script>  
<script src="/js/santa/controller.js"></script>  
<style>
  #hatContents {
    border: 1px solid black;
    width: 300px;
    padding: 10px;
  }
  #hatList {
    margin-top: 10px;
  }
</style>
<div ng-app>
  <div ng-controller="SantaCtrl">
    <h1>Santa App: HO HO HO!</h1>
    <div id="matchContianer">
      <div ng-repeat="person in theHat" ng-show="person.matched">
        {{ person.name }} - {{ person.matchName }}
      </div>
    </div>
    <div id="hatTossContainer">
      <h3>Put your name into the hat!</h3>
      <div id="hatContents">
        <div>
          <form>
            <input type="text" ng-model="name" placeholder="Please enter your name"><button ng-click="addToHat()">Add Me!</button>
          </form>
        </div>
        <div id="hatList">In the Hat:
            <div ng-repeat="person in theHat">
              {{person.name}}
            </div>
        </div>
        <button ng-click="matchPeople()" ng-disabled="!theHat.length || allMatched">Match 'em up!</button>
      </div>
    </div>  
  </div>
</div>
