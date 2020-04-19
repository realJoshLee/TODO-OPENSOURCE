<style>
  div.container {
    padding-left: 200px;
    padding-right: 200px;
  }

  .switch-one {
    display: initial;
  }

  .switch-two {
    display: none;
  }

  @media screen and (max-width: 1063px) {
    .switch-one {
      display: none;
    }

    .switch-two {
      display: initial;
    }
  }

  @media screen and (max-width: 1014px) {
    div.container {
      padding-left: 150px;
      padding-right: 150px;
    }

    a.nav-link {
      font-size: 30px;
    }
  }

  @media screen and (max-width: 826px) {
    div.container {
      padding-left: 100px;
      padding-right: 100px;
    }
  }

  @media screen and (max-width: 690px) {
    div.container {
      padding-left: 50px;
      padding-right: 50px;
    }
  }

  @media screen and (max-width: 470px) {
    div.container {
      padding-left: 0px;
      padding-right: 0px;
    }
  }

  @media screen and (max-width: 470px) {
    div.container {
      padding-left: 0px;
      padding-right: 0px;
    }

    input.task {
      width: 250px;
    }
  }
</style>