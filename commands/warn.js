const fs = require("fs");
const discord = require("discord.js");


module.exports.run = async (client, message, args) => {

    if(!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Je hebt niet de goede permissions voor deze command");

    if(!args[0])return message.reply("Je moet een gebruiker meegeven");

    if(!args[1])return message.reply("Je moet een reden meegeven");

    var warnUser = message.guild.members.cache.get(message.mentions.users.first().id || message.guild.members.get(args[0]).id)

    var reason = args.slice(1).join(" ");

    if(!warnUser) return message.reply("Kan de gebruiker niet vinden");

    if(warnUser.permissions.has("MANAGE_MESSAGES")) return message.reply("Gozer dit is een staff wat doe je.");

    const warns = JSON.parse(fs.readFileSync("./warnings.json", "UTF8"));

    if(!warns[warnUser.id]) warns[warnUser.id] = {
        warns: 0
    }

    warns[warnUser.id].warns++;

    var embed = new discord.MessageEmbed()
    .setColor("#ff0000")
    .setFooter(message.member.displayName, message.author.displayAvatarURL)
    .setTimestamp()
    .setDescription(`**Gewarnd:** ${warnUser.user.username} (${warnUser.id})
        **Warning door:** ${message.author}
        **Redenen: ** ${reason}`)
    .addField("Aantal warns", warns[warnUser.id].warns.toString());

    const channel = message.member.guild.channels.cache.get("947129745869533224");

    if(!channel) return;

    channel.send({ embeds: [embed] });

    if (warns[warnUser.id].warns == 3) {
 
        var mes = new discord.MessageEmbed()
            .setDescription("Ayo Chill Out " + warnUser.user.username)
            .setColor("#ee0000")
            .addField("Bericht", "Nog één warn en je hebt een ban.");
     
        message.channel.send({ embeds: [mes] });
     
    } else if (warns[warnUser.id].warns == 4) {
     
        message.guild.members.ban(warnUser, { reason: reason });
        message.channel.send(`${warnUser} is verbannen wegens te veel warns`);
     
    }

    fs.writeFile("./warnings.json", JSON.stringify(warns),(err) => {
        if(err) console.log(err);
    });



}

module.exports.help = {
    name: "warn",
    category: "admin",
    description: "Waarschuwt een Member!"
    
}