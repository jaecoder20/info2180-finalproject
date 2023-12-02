<div class="dash-top"> 
  <h2>New User</h2>
</div>
<div class="content">
  <form action="#" method="post">
    <div class="input-containers">
      <label class="input-labels" for="fname">First Name</label>
      <input type="text" placeholder="Jane" name="fname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="lname">Last Name</label>
      <input type="text" placeholder="Doe" name="lname" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="email">Email</label>
      <input type="email" placeholder="dummyemail@example.com" name="email" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="password">Password</label>
      <input type="password" name="password" required>
    </div>
    <div class="input-containers">
      <label class="input-labels" for="role">Role</label>
      <select name="roles" name="role" required>
        <option value="admin">Admin</option>
        <option value="member">Member</option>
      </select>
    </div>
    <input type="submit" name="submit" class="form-submit" value="Save">
  </form>
</div>