<div id="login">
<form class="form">

	<p class="name">
		  <label for="usertype"><span style="font-size: 16px">User Type</span></label>
      	  <select name="usertype" id= "usertype">
	      <option value="administrator">Administrator</option>
	      <option value="advisor">Advisor</option>
	      <option value="chairperson">Chairperson</option>
          </select>
	</p>

	<p class="email">
	    <label for="email">E-mail</label>
		<input type="email" name="email" id="email" required="required"/>
	</p>

	<p class="password">
   	  <label for="password">Password</label>
	  <input type="password" name="password" id="password" required="required" />
		
  </p>

	<p class="submit">
		<input type="submit" value="Send" />
	</p>

</form>
</div> <!-- End login div -->