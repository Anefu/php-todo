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
        
        stage('Build image') {
            steps {
                sh "docker build -t anefu/php-todo:${env.BRANCH_NAME}-${env.BUILD_NUMBER} ."
            }
        }
    }
}
