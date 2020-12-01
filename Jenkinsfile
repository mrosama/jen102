pipeline {

agent any
        parameters {
        string(name: 'Name', defaultValue: 'osama', description: 'Who should I say hello to?')

        text(name: 'BIOGRAPHY', defaultValue: '', description: 'Enter some information about the person')

        booleanParam(name: 'TOGGLE', defaultValue: true, description: 'Toggle this value')

        choice(name: 'CHOICE', choices: ['One', 'Two', 'Three'], description: 'Pick something')

        password(name: 'PASSWORD', defaultValue: 'SECRET', description: 'Enter a password')
    }
    tools {
        nodejs 'nodejs15'
    }
    environment {
        NEW_VERSION="v1.1.6"
    }

 stages {

stage('--init---'){
 steps {
            echo "inintailize code .."
             sh "php -v"
             echo "${NEW_VERSION}"
             sh "node -v"
             sh "npm -v"
             sh "composer  --version"
             echo "${env.GIT_BRANCH}"
 }
}



 stage('Checkout') {
       when {
                   expression {NAME == 'ali'}
                   not { branch "develop"}
               }
      steps {
         echo "Checkout now...for  not develop and name ali."

           }
 }










 }








}
