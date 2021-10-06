pipeline {
    agent any

    stages {

        stage("Initial cleanup") {
            steps {
                dir("${WORKSPACE}") {
                deleteDir()
                }
            }
        }
  
        stage('Checkout SCM') {
            steps {
                git branch: 'main', url: 'https://github.com/Anefu/php-todo.git'
            }
        }
    }
    def app = docker.build("anefu/php-todo:${env.BRANCH_NAME}-${env.BUILD_NUMBER}")
    app.push()
}
