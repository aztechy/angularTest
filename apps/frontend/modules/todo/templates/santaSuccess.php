<link rel="stylesheet" href="/css/santa/app.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>
<script src="/lib/angular/angular.js"></script>  
<script src="/js/santa/controller.js"></script>  

<div ng-app>
  <div ng-controller="SantaCtrl">
    <h1>Santa App: HO HO HO!</h1>
    <div id="matchContainer" ng-show="isAllMatched()">
      <h3>Matches</h3>
      <div id="matchContents">
        <div ng-repeat="person in theHat" ng-show="person.matched">
          {{ person.name }} - {{ person.matchName }}
        </div>
      </div>
    </div>
    
    <div id="hatTossContainer">
      <h3>Put your name into the hat!</h3>
      <div id="hatContents">
        <div>
          <form>
            <input id="nameInput" type="text" ng-model="name" placeholder="Please enter your name"><button ng-click="addToHat()">Add Me!</button>
          </form>
        </div>
        <div id="hatList">In the Hat:
            <div ng-repeat="person in theHat">
              {{person.name}}
            </div>
        </div>
        <button ng-click="matchPeople(reset)" ng-disabled="!theHat.length">Match 'em up!</button>
        <button ng-click="clearList()" ng-disabled="!theHat.length">Start Over</button>
      </div>
    </div>  
  </div>
</div>
