pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                script {
                    def stageType = "Build"
                    echo "${stageType} stage is running"
                }
            }
        }
        stage('Test') {
            steps {
                script {
                    def stageType = "Test"
                    echo "${stageType} stage is running"
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    def stageType = "Deploy"
                    echo "${stageType} stage is running"
                }
            }
        }
    }
}
