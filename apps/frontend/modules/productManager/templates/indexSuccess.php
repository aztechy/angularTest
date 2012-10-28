<!doctype html>
<html lang="en" ng-app>
<head>
  <meta charset="utf-8">
  <title>Product Manager</title>
</head>
<body ng-controller="selectProduct">
  <div style="float: right">
    <div ng-repeat="product in products">
      <div id="{{product.id}}">{{ product.name }} - {{ product.price | currency }}</div>
    </div>
  </div>
  <div>
    <div>Category / Subcategory</div>
    <div id="categoryPanel">
        <div>
          <select ng-model="Item.category" ng-change="updateSubcategory()">
            <option value="">--Select Category--</option>
            <option value="for_sale">For Sale</option>
            <option value="community">Community</option>
          </select>
        </div>

        <div>
          <select ng-model="Item.subcategory" ng-change="updateProducts()">
            <option value="">--Sub Category--</option>
            <option ng-repeat="subCategory in subCategories" value="{{ subCategory.key }}">
              {{ subCategory.display }}
            </option>
          </select>
        </div>    
      </div>      
    </div>
  </div>
  <script src="/lib/angular/angular.js"></script>
  <script src="/js/productManager/controllers.js"></script>
</body>
</html>