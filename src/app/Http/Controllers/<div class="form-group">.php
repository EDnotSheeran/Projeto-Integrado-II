<div class="form-group">
  <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
      id="name"
      name="name"
      value="{{ old('name') }}"
      required autocomplete="name" autofocus
      placeholder="{{ __('Name') }}">
  @error('name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>
<div class="form-group row">
  <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
          id="username"
          name="username"
          placeholder="{{ __('Nome de Usuário') }}"
          value="{{ old('username') }}"
          required
          autocomplete="username" autofocus>
      @error('username')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="text" class="form-control form-control-user @error('cpf') is-invalid @enderror"
          id="cpf"
          name="cpf"
          required
          value="{{ old('cpf') }}"
          placeholder="{{__('CPF')}}">
      @error('cpf')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>
<div class="form-group">
  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
      id="email"
      name="email"
      value="{{ old('email') }}"
      required autocomplete="email"
      placeholder="{{ __('E-Mail Address') }}">
  @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
</div>
<div class="form-group row">
  <div class="col-sm-6 mb-3 mb-sm-0">
      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
          id="password"
          name="password"
          required
          autocomplete="new-password"
          placeholder="{{ __('Password') }}">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="col-sm-6">
      <input type="password" class="form-control form-control-user"
          id="password-confirm"
          name="password_confirmation"
          required
          autocomplete="new-password"
          placeholder="{{ __('Confirm Password') }}">
  </div>
</div>
<hr>
<div class="form-group">
  <div class="custom-control custom-checkbox small">
      <input class="custom-control-input"
          type="checkbox"
          name="tipo"
          id="tipo" {{ old('tipo') ? 'checked' : '' }}>

      <label class="custom-control-label" for="tipo" style="line-height: 26px;">
          {{ __('I\'m an employee of the City Hall') }}
      </label>
  </div>
</div>
<div id="dadosAdicionais">
  <hr>
  <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="text" class="form-control form-control-user @error('matricula') is-invalid @enderror"
              id="matricula"
              name="matricula"
              value="{{ old('matricula') }}"
              placeholder="{{ __('Registration') }}">
          @error('matricula')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="col-sm-6">
          <input type="text" class="form-control form-control-user @error('cargo') is-invalid @enderror"
              id="cargo"
              name="cargo"
              value="{{ old('cargo') }}"
              placeholder="{{ __('Office') }}">
          @error('cargo')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>
  <div class="form-group">
      <input type="text" class="form-control form-control-user @error('sede') is-invalid @enderror"
          id="sede"
          name="sede"
          value="{{ old('sede') }}"
          placeholder="{{ __('Head Office') }}">
      @error('sede')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
</div>