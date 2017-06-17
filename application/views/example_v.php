<div class="span10 top10">
<div ng-controller="NameCtrl">
    First Name:<input ng-model="firstName" name="firstName" type="text"/></br></br>
    Last  Name:<input ng-model="lastName" name="lastName" type="text"/></br></br>
	User Name:<input ng-model="firstName" name="username" type="text"/></br></br>
    Hello {{firstName}} {{lastName}}
	</br>
	
	  <hr>
	Contacts List
	 <div ng-controller="ContactCtrl">
    <ul>
      <li ng-repeat="name in names">{{name}}
	  <a href="" ng-click="removeName(name)"> Remove</a></li>
    </ul>
	
	<form ng-submit="addName()">
      <input type="text" ng-model="enteredName">
      <input type="submit" value="add">
    </form>
  </div>
  <hr>
  Country list using object notation
  <div ng-controller="CountryObjCtrl">
    <table>
	<tr>
	<th>Name</td>
	<th>Population</td></tr>
	
      <tr ng-repeat="country in countries">
	  <td><a href="<?php echo base_url();?>angularjs/example/#/{{country.name}}">{{country.name}}</a></td> 
	  <td>{{country.population}}</td></tr>
    </table>
  </div>
  <hr>
  Country list from database
  <div ng-controller="CountriesCtrl">
    Search:<input ng-model="query" type="text"/>
	<table>
	<tr>
	<th><a href="" ng-click="sortField = 'COUNTRY_SHORTNAME'; reverse = !reverse">Name</a></td>
	<th><a href="" ng-click="sortField = 'COUNTRY_LONGNAME'; reverse = !reverse">Full Name</a></td> 
	<th><a href="" ng-click="sortField = 'CALLING_CODE'; reverse = !reverse">Call Code</a></td>
	</tr>
	
      <tr ng-repeat="country in countries_list |  filter:query | orderBy:sortField:reverse;">
	  <td>{{country.COUNTRY_SHORTNAME}}</td> <td>{{country.COUNTRY_LONGNAME}}</td><td>{{country.CALLING_CODE}}</td></tr>
    </table>
  </div>
  
  
  </div>
  </div>