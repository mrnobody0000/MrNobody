import javax.sound.sampled.*;
import javax.swing.JFrame;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Random;
import java.util.Scanner;

class Level3 extends JPanel implements ActionListener{


    File music = new File("music.wav");
    AudioInputStream audioStream = AudioSystem.getAudioInputStream(music);
    Clip clip = AudioSystem.getClip();

    static final int SCREEN_WIDTH =600;
    static final int SCREEN_HEIGHT = 600;
    static final int UNIT_SIZE = 15;
    static final int GAME_UNITS = (SCREEN_WIDTH*SCREEN_HEIGHT)/(UNIT_SIZE*UNIT_SIZE);
    static int DELAY;
    final int x[] = new int[GAME_UNITS];
    final int y[] = new int[GAME_UNITS];
    int bodyParts =3;
    int applesEaten;
    int appleX;
    int appleY;

    static int sp=0;
    char direction = 'R';
    boolean running = false;
    Timer timer;
    Random random;
    static boolean gameOn = false;
    int runningSound,golden=0,levelSelector;


    Level3(int sond,int lvl,int sp) throws IOException, UnsupportedAudioFileException, LineUnavailableException {
        for(int i=0;i<GAME_UNITS;i++)
        {
            x[i]=0;
            y[i]=0;
        }

        random = new Random();
        runningSound=sond;
        levelSelector=lvl;
        DELAY=sp;
        this.setPreferredSize(new Dimension(SCREEN_WIDTH,SCREEN_HEIGHT));
        this.setBackground(Color.black);
        this.setFocusable(true);
        this.addKeyListener(new MyKeyAdapter());
        startGame();

    }
    public void startGame() throws IOException, LineUnavailableException {
        newApple();

        running = true;
        if(runningSound==0) {
            clip.open(audioStream);
            clip.start();
        }


        timer = new Timer(DELAY,this);
        timer.start();
    }

    public void pause() {
        Level3.gameOn = true;
        timer.stop();
        clip.stop();
    }

    public void resume() {
        Level3.gameOn = false;
        timer.start();
        clip.start();
    }

    public void paintComponent(Graphics g) {
        super.paintComponent(g);
        try {
            draw(g);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    public void draw(Graphics g) throws IOException {

        if(running) {

          /*  for(int i=0;i<SCREEN_HEIGHT/UNIT_SIZE;i++) {
                g.drawLine(i * UNIT_SIZE, 0, i * UNIT_SIZE, SCREEN_HEIGHT);
                g.drawLine(0, i * UNIT_SIZE, SCREEN_WIDTH, i * UNIT_SIZE);
            }*/
            g.setColor(Color.WHITE);
            g.drawRect(2,620, 610 ,40);
            g.setColor(Color.blue);

            ImageIcon brick=new ImageIcon("bbrick.png");

            for(int i=0;i<360;i+=15)
                g.drawImage(brick.getImage(), 225, i, UNIT_SIZE, UNIT_SIZE,null);

            for(int i=0;i<240;i+=15)
                g.drawImage(brick.getImage(), i, 450, UNIT_SIZE, UNIT_SIZE,null);

            for(int i=360;i<615;i+=15)
                g.drawImage(brick.getImage(), i, 120, UNIT_SIZE, UNIT_SIZE,null);

            for(int i=225;i<615;i+=15)
                g.drawImage(brick.getImage(), 360, i, UNIT_SIZE, UNIT_SIZE,null);







            ImageIcon apple=new ImageIcon("app1.png");
            ImageIcon gappleim=new ImageIcon("gapp1.png");

            if(golden==5)
            {
                g.setColor(Color.YELLOW);
                //  g.fillOval(appleX, appleY, UNIT_SIZE+3, UNIT_SIZE+3);
                g.drawImage(gappleim.getImage(), appleX, appleY, UNIT_SIZE+2, UNIT_SIZE+2,null);


            }
            else {
                g.setColor(Color.red);
                //  g.fillOval(appleX, appleY, UNIT_SIZE, UNIT_SIZE);
                g.drawImage(apple.getImage(), appleX, appleY, UNIT_SIZE, UNIT_SIZE,null);
            }

            ImageIcon upmouth=new ImageIcon("upmouth.png");
            ImageIcon downmouth=new ImageIcon("downmouth.png");
            ImageIcon leftmouth=new ImageIcon("leftmouth.png");
            ImageIcon rightmouth=new ImageIcon("rightmouth.png");


            for(int i = 0; i< bodyParts;i++) {
                if(i == 0) {
                    // g.setColor(Color.green);
                    //       g.fillOval(x[i]+15, y[i]+15, UNIT_SIZE, UNIT_SIZE);
                    if(direction=='U')
                        g.drawImage(upmouth.getImage(), x[i], y[i], UNIT_SIZE, UNIT_SIZE,null);
                    if(direction=='D')
                        g.drawImage(downmouth.getImage(), x[i], y[i], UNIT_SIZE, UNIT_SIZE,null);
                    if(direction=='L')
                        g.drawImage(leftmouth.getImage(), x[i], y[i], UNIT_SIZE, UNIT_SIZE,null);
                    if(direction=='R')
                        g.drawImage(rightmouth.getImage(), x[i], y[i], UNIT_SIZE, UNIT_SIZE,null);

                }
                else {
                    //  g.setColor(Color.blue);
                    g.setColor(new Color(0X429eee));
                    g.fillOval(x[i], y[i], UNIT_SIZE, UNIT_SIZE);
                    // g.drawImage(body.getImage(), x[i]+15, y[i]+15, UNIT_SIZE, UNIT_SIZE,null);

                }
            }





            g.setColor(new Color(0XDC5539));
            g.setFont( new Font(" Ink Free",Font.BOLD, 20));
            FontMetrics metrics = getFontMetrics(g.getFont());
            // g.drawString(" Score: "+applesEaten, (SCREEN_WIDTH - metrics.stringWidth(" Score: "+applesEaten))/2, g.getFont().getSize());
            g.drawString(" Score: "+applesEaten, 500, 645);
            g.drawString(" MILL ", 20, 645);


        }
        else {
            gameOver(g);
        }

    }
    public void newApple() {
        appleX = random.nextInt((int) (SCREEN_WIDTH / UNIT_SIZE)) * UNIT_SIZE;
        appleY = random.nextInt((int) (SCREEN_HEIGHT / UNIT_SIZE)) * UNIT_SIZE;

        for(int i = bodyParts;i>0;i--) {
            if((appleX == x[i])&& (appleY == y[i])) {
                newApple();
            }
        }
        if(appleX>=225&& appleX<240&& appleY<360)
            newApple();

        if(appleX <240&&(appleY>=450&& appleY<465))
            newApple();

        if(appleX>=360 && (appleY>=120&& appleY<135))
            newApple();

        if(appleX>=360&&appleX<375&& appleY>=225)
            newApple();
    }


    public void move(){
        for(int i = bodyParts;i>0;i--) {
            x[i] = x[i-1];
            y[i] = y[i-1];
        }
        switch(direction) {
            case 'U':
                y[0] = y[0] - UNIT_SIZE;
                break;
            case 'D':
                y[0] = y[0] + UNIT_SIZE;
                break;
            case 'L':
                x[0] = x[0] - UNIT_SIZE;
                break;
            case 'R':
                x[0] = x[0] + UNIT_SIZE;
                break;
            default:
                break;
        }

    }
    public void checkApple() {
        if((x[0] == appleX) && (y[0] == appleY)) {
            bodyParts++;

            if(golden==5)
            {
                applesEaten+=5;
                golden=0;
            }
            else
                applesEaten++;
            golden++;
            newApple();
        }
    }
    public void checkCollisions() {
        //checks if head collides with body
        for(int i = bodyParts;i>0;i--) {
            if((x[0] == x[i])&& (y[0] == y[i])) {
                running = false;
            }
        }
        //check if head touches left border
        if(x[0] < 0) {
            //  running = false;
            x[0]=SCREEN_HEIGHT;

        }
        //check if head touches right border
        if(x[0] > SCREEN_WIDTH) {
            //  running = false;
            x[0]=0;
        }
        //check if head touches top border
        if(y[0] < 0) {
            // running = false;
            y[0]=SCREEN_HEIGHT;
        }
        //check if head touches bottom border
        if(y[0] > SCREEN_HEIGHT) {
            //  running = false;
            y[0]=0;
        }

        if(x[0]>=225&& x[0]<240&& y[0]<360)
            running=false;

        if(x[0] <240&&(y[0]>=450&& y[0]<465))
            running=false;

        if(x[0]>=360 && (y[0]>=120&& y[0]<135))
            running=false;

        if(x[0]>=360&&x[0]<375&& y[0]>=225)
            running=false;

        if(!running) {
            timer.stop();
        }
    }



    public void gameOver(Graphics g) throws IOException {
        //Score
        clip.stop();
        clip.close();

        File highScore = new File("highScore.txt");
        Scanner sc = new Scanner(highScore);
        String val = sc.next();
        int value = Integer.parseInt(val);
        sc.close();

        String hsc = String.valueOf(applesEaten);

        if(applesEaten>value) {
            FileWriter writer = new FileWriter(highScore);
            writer.write(hsc);
            writer.close();

            String name= JOptionPane.showInputDialog(null,"DAMN! YOU SO PRO !\n"+
                    "Enter your username : ");
            File highScorer = new File("highScorer.txt");
            FileWriter hscr = new FileWriter(highScorer);
            hscr.write(name);
            hscr.close();

        }

        new EndScreen(applesEaten,runningSound,levelSelector,DELAY);

        JFrame parent = (JFrame) this.getTopLevelAncestor();
        parent.dispose();


    }

    @Override
    public void actionPerformed(ActionEvent e) {

        if(running) {
            move();
            checkApple();
            checkCollisions();
        }
        repaint();
    }

    public class MyKeyAdapter extends KeyAdapter{
        @Override
        public void keyPressed(KeyEvent e) {
            switch(e.getKeyCode()) {
                case KeyEvent.VK_LEFT:
                    if(direction != 'R') {
                        direction = 'L';
                    }
                    break;
                case KeyEvent.VK_RIGHT:
                    if(direction != 'L') {
                        direction = 'R';
                    }
                    break;
                case KeyEvent.VK_UP:
                    if(direction != 'D') {
                        direction = 'U';
                    }
                    break;
                case KeyEvent.VK_DOWN:
                    if(direction != 'U') {
                        direction = 'D';
                    }
                    break;
                case KeyEvent.VK_SPACE:
                    if(Level3.gameOn) {
                        resume();
                    } else {
                        pause();
                    }
                    break;
                default:
                    break;
            }
        }
    }
}