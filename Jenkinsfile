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

        stage("Build Docker Image") {
            steps {
                sh "docker build -t anefu/php-todo:${env.BRANCH_NAME}-${env.BUILD_NUMBER}"
            }
        }

        stage("Push to Docker Hub") {
            steps {
            sh "docker push anefu/php-todo:${env.BRANCH_NAME}-${env.BUILD_NUMBER} ."
            }
        }
    }
}
